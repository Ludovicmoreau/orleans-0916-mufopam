<?php

namespace Gdr3625\BackofficeBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Gdr3625\BackofficeBundle\Entity\Equipes_Brevets;

/**
 * Equipes_Brevets controller.
 *
 * @Route("/equipes_brevets")
 */
class Equipes_BrevetsController extends Controller
{
    /**
     * Lists all Equipes_Brevets entities.
     *
     * @Route("/", name="equipes_brevets_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $equipes_Brevets = $em->getRepository('Gdr3625BackofficeBundle:Equipes_Brevets')->findAll();

        return $this->render('equipes_brevets/index.html.twig', array(
            'equipes_Brevets' => $equipes_Brevets,
        ));
    }

    /**
     * Finds and displays a Equipes_Brevets entity.
     *
     * @Route("/{id}", name="equipes_brevets_show")
     * @Method("GET")
     */
    public function showAction(Equipes_Brevets $equipes_Brevet)
    {

        return $this->render('equipes_brevets/show.html.twig', array(
            'equipes_Brevet' => $equipes_Brevet,
        ));
    }
}
