<?php

namespace Gdr3625\BackofficeBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Gdr3625\BackofficeBundle\Entity\Equipes_Publications;

/**
 * Equipes_Publications controller.
 *
 * @Route("/equipes_publications")
 */
class Equipes_PublicationsController extends Controller
{
    /**
     * Lists all Equipes_Publications entities.
     *
     * @Route("/", name="equipes_publications_index")
     * @Method("GET")
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
     * @Route("/{id}", name="equipes_publications_show")
     * @Method("GET")
     */
    public function showAction(Equipes_Publications $equipes_Publication)
    {

        return $this->render('equipes_publications/show.html.twig', array(
            'equipes_Publication' => $equipes_Publication,
        ));
    }
}
