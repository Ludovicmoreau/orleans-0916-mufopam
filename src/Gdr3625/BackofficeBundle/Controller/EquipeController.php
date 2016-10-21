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
 * @Route("back/equipes")
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

        $equipes = $em->getRepository('Gdr3625BackofficeBundle:Equipe')->findAll();
        

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
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $equipe->setLogo($fileName);
            $file->move(
                $this->getParameter('upload_directory'),
                $fileName
            );
            $em = $this->getDoctrine()->getManager();
            $em->persist($equipe);
            $em->flush();

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
        $equipe->setLogo(
            new File($this->getParameter('load_directory').'/'.$equipe->getLogo())
        );
        $deleteForm = $this->createDeleteForm($equipe);
        $editForm = $this->createForm('Gdr3625\BackofficeBundle\Form\EquipeType', $equipe);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $file = $equipe->getLogo();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $equipe->setLogo($fileName);
            $file->move(
                $this->getParameter('upload_directory'),
                $fileName
            );

            $em = $this->getDoctrine()->getManager();
            $em->persist($equipe);
            $em->flush();

            return $this->redirectToRoute('equipe_edit', array('id' => $equipe->getId()));
        }

        return $this->render('equipe/edit.html.twig', array(
            'equipe' => $equipe,
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
}


