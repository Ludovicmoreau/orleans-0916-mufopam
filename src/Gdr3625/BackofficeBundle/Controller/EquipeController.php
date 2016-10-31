<?php

namespace Gdr3625\BackofficeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Gdr3625\BackofficeBundle\Entity\Equipe;
use Gdr3625\BackofficeBundle\Form\EquipeType;
use Symfony\Component\HttpFoundation\File\File;
use Gdr3625\BackofficeBundle\Entity\Keywords;



/**
 * Equipe controller.
 *
 * @Route("back/equipes", name="back_equipes")
 */

class EquipeController extends Controller
{
    /**
     * Lists all Equipe entities.
     *
     * @Route("/", name="equipe_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $equipes = $em->getRepository('Gdr3625BackofficeBundle:Equipe')->findBy(array(),array('id'=>'DESC'));
        

        return $this->render('equipe/index.html.twig', array(
            'equipes' => $equipes,
        ));
    }

    /**
     * Creates a new Equipe entity.
     *
     * @Route("/new", name="equipe_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $equipe = new Equipe();
        $form = $this->createForm('Gdr3625\BackofficeBundle\Form\EquipeType', $equipe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $equipe->getLogo();
            $fileName = md5(uniqid()) . '.' . $file->guessExtension();
            $equipe->setLogo($fileName);
            $file->move(
                $this->getParameter('upload_directory'),
                $fileName
            );
            $em = $this->getDoctrine()->getManager();
            $em->persist($equipe);
            $em->flush();

            // generation de umap.json après création équipe
            $this->generateMapAction();
            // load success message in flashbag
            $this->addFlash('success',"Création équipe terminée");
            return $this->redirectToRoute('equipe_show', array('id' => $equipe->getId()));
        }
        return $this->render('equipe/new.html.twig', array(
            'equipe' => $equipe,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Equipe entity.
     *
     * @Route("/{id}", name="equipe_show")
     * @Method("GET")
     */
    public function showAction(Equipe $equipe)
    {
        $deleteForm = $this->createDeleteForm($equipe);

        return $this->render('equipe/show.html.twig', array(
            'equipe' => $equipe,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Equipe entity.
     *
     * @Route("/{id}/edit", name="equipe_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Equipe $equipe)
    {

        if (!is_null($equipe->getLogo()) and !empty($equipe->getLogo())) {
            $logo = new File($this->getParameter('upload_directory') . $equipe->getLogo());
            $equipe->setLogo($logo);
        }
        $deleteForm = $this->createDeleteForm($equipe);
        $editForm = $this->createForm('Gdr3625\BackofficeBundle\Form\EquipeType', $equipe);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $file = $equipe->getLogo();
            if (!is_null($file)  and !empty($file)) {
                $fileName = md5(uniqid()) . '.' . $file->guessExtension();
                $equipe->setLogo($fileName);
                $file->move(
                    $this->getParameter('upload_directory'),
                    $fileName
                );
            }elseif (isset($logo)) {
               // var_dump($logo); exit();
                $equipe->setLogo(basename($logo));
            }
            $em = $this->getDoctrine()->getManager();
            $em->persist($equipe);
            $em->flush();

            // generation de umap.json après modification équipe
            $this->generateMapAction();

            // load success message in flashbag
            $this->addFlash('success',"Edition équipe terminée");
            return $this->redirectToRoute('equipe_show', array('id' => $equipe->getId()));
        }

        return $this->render('equipe/edit.html.twig', array(
            'equipe' => $equipe,
            'logopath'=>basename($equipe->getLogo()),
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Equipe entity.
     *
     * @Route("/{id}", name="equipe_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Equipe $equipe)
    {
        $form = $this->createDeleteForm($equipe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($equipe);
            $em->flush();
        }

        // generation de umap.json après suppression équipe
        $this->generateMapAction();
        // load success message in flashbag
        $this->addFlash('success',"Equipe supprimée");
        return $this->redirectToRoute('equipe_index');
    }

    /**
     * Creates a form to delete a Equipe entity.
     *
     * @param Equipe $equipe The Equipe entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Equipe $equipe)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('equipe_delete', array('id' => $equipe->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    // Generation du geojson pour carte dynamique vers umap.openstreetmap.fr
    // Lien vers la carte : http://umap.openstreetmap.fr/fr/map/mufopam_104845
    // Récupération de l'adresse de l'équipe dans la BDD et conversion avec google api de l'adresse en coordonnées latitude et longitude
    /**
     * @Route("/generateMap", name="generate_map")
     */
    public function generateMapAction()
    {
        if (file_exists('umap.json')) {
            unlink('umap.json');
        }
        //init variables
        $root = "%kernel.root_dir%/../web/images/logos_equipes/";
        $em = $this->getDoctrine()->getManager();
        $geojson = '';
        $errorApi = false;

        // get values from bdd
        $equipesDatas = $em->getRepository('Gdr3625BackofficeBundle:Equipe')->findAll();

        foreach($equipesDatas as $key => $equipeData){

            $adresse = urlencode($equipeData->getRue().' '.$equipeData->getCp().' '.$equipeData->getVille());
            $url="https://maps.googleapis.com/maps/api/geocode/json?address='.$adresse.'";
            if (!$json = file_get_contents($url)){
                $errorApi = true;
                $this->addFlash('danger',"Il y a un erreur dans la fiche de l\'équipe, il est impossible trouver la latitude et la longitude pour cette adresse" );
                break;
            }else {
                $coord[] = json_decode($json, true);
                $lat = $coord[$key]['results'][0]['geometry']['location']['lat'];
                $lng = $coord[$key]['results'][0]['geometry']['location']['lng'];
                $geojson = $geojson .
                    '
                    {  
                        "type": "Feature",
                        "properties": {
                            "country": "France",
                            "city": "' . $equipeData->getVille() . '",
                            "street": "' . $equipeData->getRue() . '",
                            "postcode": "' . $equipeData->getCp() . '",
                            "name": "' . $equipeData->getNomEquipe() . '",
                            "description": "'.$root.$equipeData->getLogo().'\n\n# Référent :\n**'.$equipeData->getNomReferent().' '.$equipeData->getPrenomReferent().'**\n---\n**Nous trouver : [[' . $equipeData->getSiteWebEquipe() . '|Site-Web]]**",
                            "_storage_options": {
                                "color": "Blue"
                            }
                        },
                        "geometry": {
                            "type": "Point",
                            "coordinates": [
                                ' . $lng . ',
                                ' . $lat . '
                            ]
                        }
                    }';
                if ($key < count($equipesDatas) - 1) {
                    $geojson = $geojson . ',';
                }
                $fp = fopen('umap.json','w+');
                fwrite($fp,'
                {
                    "type": "FeatureCollection",
                    "features": ['
                    .$geojson.'
                    ]
                }');
                fclose($fp);
            }
        }
        if (!$errorApi){
            $this->addFlash('success','Génération de la carte réussi, patientez quelques minutes pour que la carte soit actualisée');
        }
        return $this->redirectToRoute('equipe_index');
    }
}


