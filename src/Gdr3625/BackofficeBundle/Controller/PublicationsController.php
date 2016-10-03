<?php

namespace Gdr3625\BackofficeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Gdr3625\BackofficeBundle\Entity\Publications;
use Gdr3625\BackofficeBundle\Form\PublicationsType;

/**
 * Publications controller.
 *
 */
class PublicationsController extends Controller
{
    /**
     * Lists all Publications entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $publications = $em->getRepository('Gdr3625BackofficeBundle:Publications')->findAll();

        return $this->render('publications/index.html.twig', array(
            'publications' => $publications,
        ));
    }

    /**
     * Creates a new Publications entity.
     *
     */
    public function newAction(Request $request)
    {
        $publication = new Publications();
        $form = $this->createForm('Gdr3625\BackofficeBundle\Form\PublicationsType', $publication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
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
     * Displays a form to edit an existing Publications entity.
     *
     */
    public function editAction(Request $request, Publications $publication)
    {
        $deleteForm = $this->createDeleteForm($publication);
        $editForm = $this->createForm('Gdr3625\BackofficeBundle\Form\PublicationsType', $publication);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($publication);
            $em->flush();

            return $this->redirectToRoute('publications_edit', array('id' => $publication->getId()));
        }

        return $this->render('publications/edit.html.twig', array(
            'publication' => $publication,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Publications entity.
     *
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
