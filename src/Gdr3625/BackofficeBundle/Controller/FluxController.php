<?php

namespace Gdr3625\BackofficeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Gdr3625\BackofficeBundle\Entity\Flux;
use Gdr3625\BackofficeBundle\Form\FluxType;

/**
 * Flux controller.
 *
 */
class FluxController extends Controller
{
    /**
     * Lists all Flux entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $fluxes = $em->getRepository('Gdr3625BackofficeBundle:Flux')->findAll();

        return $this->render('flux/index.html.twig', array(
            'fluxes' => $fluxes,
        ));
    }

    /**
     * Creates a new Flux entity.
     *
     */
    public function newAction(Request $request)
    {
        $flux = new Flux();
        $form = $this->createForm('Gdr3625\BackofficeBundle\Form\FluxType', $flux);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($flux);
            $em->flush();

            return $this->redirectToRoute('flux_show', array('id' => $flux->getId()));
        }

        return $this->render('flux/new.html.twig', array(
            'flux' => $flux,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Flux entity.
     *
     */
    public function showAction(Flux $flux)
    {
        $deleteForm = $this->createDeleteForm($flux);

        return $this->render('flux/show.html.twig', array(
            'flux' => $flux,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Flux entity.
     *
     */
    public function editAction(Request $request, Flux $flux)
    {
        $deleteForm = $this->createDeleteForm($flux);
        $editForm = $this->createForm('Gdr3625\BackofficeBundle\Form\FluxType', $flux);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($flux);
            $em->flush();

            return $this->redirectToRoute('flux_edit', array('id' => $flux->getId()));
        }

        return $this->render('flux/edit.html.twig', array(
            'flux' => $flux,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Flux entity.
     *
     */
    public function deleteAction(Request $request, Flux $flux)
    {
        $form = $this->createDeleteForm($flux);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($flux);
            $em->flush();
        }

        return $this->redirectToRoute('flux_index');
    }

    /**
     * Creates a form to delete a Flux entity.
     *
     * @param Flux $flux The Flux entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Flux $flux)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('flux_delete', array('id' => $flux->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
