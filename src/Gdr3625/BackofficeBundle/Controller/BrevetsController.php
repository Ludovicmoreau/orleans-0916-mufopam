<?php

namespace Gdr3625\BackofficeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Gdr3625\BackofficeBundle\Entity\Brevets;
use Gdr3625\BackofficeBundle\Form\BrevetsType;

/**
 * Brevets controller.
 *
 * @Route("/brevets")
 */
class BrevetsController extends Controller
{
    /**
     * Lists all Brevets entities.
     *
     * @Route("/", name="brevets_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $brevets = $em->getRepository('Gdr3625BackofficeBundle:Brevets')->findAll();

        return $this->render('brevets/index.html.twig', array(
            'brevets' => $brevets,
        ));
    }

    /**
     * Creates a new Brevets entity.
     *
     * @Route("/new", name="brevets_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $brevet = new Brevets();
        $form = $this->createForm('Gdr3625\BackofficeBundle\Form\BrevetsType', $brevet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($brevet);
            $em->flush();

            return $this->redirectToRoute('brevets_show', array('id' => $brevet->getId()));
        }

        return $this->render('brevets/new.html.twig', array(
            'brevet' => $brevet,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Brevets entity.
     *
     * @Route("/{id}", name="brevets_show")
     * @Method("GET")
     */
    public function showAction(Brevets $brevet)
    {
        $deleteForm = $this->createDeleteForm($brevet);

        return $this->render('brevets/show.html.twig', array(
            'brevet' => $brevet,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Brevets entity.
     *
     * @Route("/{id}/edit", name="brevets_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Brevets $brevet)
    {
        $deleteForm = $this->createDeleteForm($brevet);
        $editForm = $this->createForm('Gdr3625\BackofficeBundle\Form\BrevetsType', $brevet);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($brevet);
            $em->flush();

            return $this->redirectToRoute('brevets_edit', array('id' => $brevet->getId()));
        }

        return $this->render('brevets/edit.html.twig', array(
            'brevet' => $brevet,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Brevets entity.
     *
     * @Route("/{id}", name="brevets_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Brevets $brevet)
    {
        $form = $this->createDeleteForm($brevet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($brevet);
            $em->flush();
        }

        return $this->redirectToRoute('brevets_index');
    }

    /**
     * Creates a form to delete a Brevets entity.
     *
     * @param Brevets $brevet The Brevets entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Brevets $brevet)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('brevets_delete', array('id' => $brevet->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
