<?php

namespace Gdr3625\BackofficeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Gdr3625\BackofficeBundle\Entity\Equipe;
use Gdr3625\BackofficeBundle\Form\EquipeType;
use Symfony\Component\HttpFoundation\File\File;



/**
 * Equipe controller.
 *
 * @Route("/back/equipes", name="back_equipes")
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
            $this->addFlash('success',"Création équipe terminée.");
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

        /*if (!is_null($equipe->getLogo()) and !empty($equipe->getLogo())) {
            $logo = new File($this->getParameter('upload_directory') . $equipe->getLogo());
            $equipe->setLogo($logo);
        }*/
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
                $equipe->setLogo(basename($logo));
            }
            $em = $this->getDoctrine()->getManager();
            $em->persist($equipe);
            $em->flush();

            // generation de umap.json après modification équipe
            $this->generateMapAction();

            // load success message in flashbag
            $this->addFlash('success',"Edition équipe terminée.");
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
     * @Route("/generate/map", name="generate_map")
     */
    public function generateMapAction()
    {
        //init variables
        $root = $this->getParameter('upload_directory');
        $em = $this->getDoctrine()->getManager();
        $geojson = '';
        $errorApi = false;

        // get values from bdd
        $equipesDatas = $em->getRepository('Gdr3625BackofficeBundle:Equipe')->findAll();
        $nbEquipes = count($equipesDatas);

        // write geojson for umap
        foreach($equipesDatas as $key => $equipeData){
            // address construct
            $adresse = urlencode($equipeData->getRue().' '.$equipeData->getCp().' '.$equipeData->getVille());
            // url construct
            $url="https://maps.googleapis.com/maps/api/geocode/json?address='.$adresse.'&key=AIzaSyC3FNl0wh7Ucu8CpnoIw6xH_Pz15ZuAcIs";

            // if error address break loop , show flash message and redirect to equipe_index
            if (file_get_contents($url) == false) {
                $errorApi = true;
                $this->addFlash('danger', 'Il y a une erreur dans la fiche de l\'équipe n°'.$equipeData->getId().', il est impossible trouver la latitude et la longitude pour cette adresse.');
                break;
            }else {
                // test if dayli api resquest aren't over limit
                $testApi[] = json_decode(file_get_contents($url),true);
                // if error limit, break loop, show flash message and redirect to equipe_index
                if ($testApi[0]['status'] == 'OVER_QUERY_LIMIT') {
                    $errorApi = true;
                    $this->addFlash('danger', "Opération annulée. Vous avez dépassé le nombre de génération de la carte pour la journée.");
                    break;
                } else {
                    // no error => write umap.json
                    $json = file_get_contents($url);
                    $coord[] = json_decode($json, true);
                    // get latitude and longitude for team address
                    $lat = $coord[$key]['results'][0]['geometry']['location']['lat'];
                    $lng = $coord[$key]['results'][0]['geometry']['location']['lng'];
                    //write geojson for each team
                    $geojson = $geojson .
                        '
                        {  
                            "type": "Feature",
                            "properties": {
                                "country": "France",
                                "city": "' . trim($equipeData->getVille()) . '",
                                "street": "' . trim($equipeData->getRue()) . '",
                                "postcode": "' . trim($equipeData->getCp()) . '",
                                "name": "' . trim($equipeData->getNomEquipe()) . '",
                                "description": "{' . $root . $equipeData->getLogo() . '}\n---** Référent : [[mailto:' . $equipeData->getEmailReferent() . '|' . trim($equipeData->getNomReferent()) . ' ' . trim($equipeData->getPrenomReferent()) . ']]**\n---**Nous trouver : [[' . trim($equipeData->getSiteWebEquipe()) . '|Site-Web]]**",
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
                    // for the last team dont add comma à the end
                    if ($key < $nbEquipes - 1) {
                        $geojson = $geojson . ',';
                    }
                    // write all in umap.json
                    $fp = fopen('umap.json', 'w+');
                    fwrite($fp, '
                    {
                        "type": "FeatureCollection",
                        "features": ['
                        . $geojson . '
                        ]
                    }');
                    fclose($fp);
                }
            }
        }
        // if no error show success message
        if ($errorApi == false){
            $this->addFlash('success','Génération de la carte réussi, patientez au moins 5 minutes pour que les données de la carte soit actualisée.');
        }
        return $this->redirectToRoute('equipe_index');
    }
}