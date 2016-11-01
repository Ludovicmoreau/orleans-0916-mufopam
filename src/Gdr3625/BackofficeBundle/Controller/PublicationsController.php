<?php

namespace Gdr3625\BackofficeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Gdr3625\BackofficeBundle\Entity\Publications;
use Gdr3625\BackofficeBundle\Form\PublicationsType;

/**
 * Publications controller.
 *
 * @Route("/back/publications", name="back_publications")
 */
class PublicationsController extends Controller
{
    /**
     * Lists all Publications entities.
     *
     * @Route("/", name="publications_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $publications = $em->getRepository('Gdr3625BackofficeBundle:Publications')->findBy(array(),array('id'=>'DESC'));

        return $this->render('publications/index.html.twig', array(
            'publications' => $publications,
        ));
    }

    /**
     * Creates a new Publications entity.
     *
     * @Route("/new", name="publications_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $publication = new Publications();
        $form = $this->createForm('Gdr3625\BackofficeBundle\Form\PublicationsType', $publication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
                $json = file_get_contents('http://api.crossref.org/works/' . $publication->getDoi());
                $publicationJson = json_decode($json, true);
                $publication->setTitre($publicationJson['message']['title'][0]);
                $publication->setDate($publicationJson['message']['published-print']['date-parts'][0][1] . '-' . $publicationJson['message']['published-print']['date-parts'][0][0]);
                $authors = '';
                foreach ($publicationJson['message']['author'] as $author) {
                    $authors[] = $author['given'] . ' ' . $author['family'];
                }
                $publication->setAuteur(implode(', ', $authors));
                $publication->setRevue($publicationJson['message']['publisher']);
                $publication->setLien($publicationJson['message']['URL']);
                $em->persist($publication);
                $em->flush();

                return $this->redirectToRoute('publications_show', array('id' => $publication->getId()));
        }

        return $this->render('publications/new.html.twig', array(
            'publication' => $publication,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Publications entity.
     *
     * @Route("/{id}", name="publications_show")
     * @Method("GET")
     */
    public function showAction(Publications $publication)
    {
        $deleteForm = $this->createDeleteForm($publication);

        return $this->render('publications/show.html.twig', array(
            'publication' => $publication,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Publications entity.
     *
     * @Route("/{id}", name="publications_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Publications $publication)
    {
        $form = $this->createDeleteForm($publication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($publication);
            $em->flush();
        }

        return $this->redirectToRoute('publications_index');
    }

    /**
     * Creates a form to delete a Publications entity.
     *
     * @param Publications $publication The Publications entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Publications $publication)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('publications_delete', array('id' => $publication->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
