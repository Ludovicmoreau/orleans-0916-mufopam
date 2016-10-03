<?php

namespace Gdr3625\BackofficeBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Gdr3625\BackofficeBundle\Entity\Equipes_Publications;

/**
 * Equipes_Publications controller.
 *
 */
class Equipes_PublicationsController extends Controller
{
    /**
     * Lists all Equipes_Publications entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $equipes_Publications = $em->getRepository('Gdr3625BackofficeBundle:Equipes_Publications')->findAll();

        return $this->render('equipes_publications/index.html.twig', array(
            'equipes_Publications' => $equipes_Publications,
        ));
    }

    /**
     * Finds and displays a Equipes_Publications entity.
     *
     */
    public function showAction(Equipes_Publications $equipes_Publication)
    {

        return $this->render('equipes_publications/show.html.twig', array(
            'equipes_Publication' => $equipes_Publication,
        ));
    }
}
