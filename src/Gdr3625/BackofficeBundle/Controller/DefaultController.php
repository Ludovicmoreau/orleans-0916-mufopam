<?php

namespace Gdr3625\BackofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/back")
     */
    public function indexAction()
    {
        return $this->render('base_backoffice.html.twig');
    }

    /**
     * @Route("/accueil")
     */
    public function accueilAction()
    {
        return $this->render('base.html.twig');
    }

    /**
     * @Route("/equipes", name="equipes")
     */
    public function equipesAction()
    {
        $em = $this->getDoctrine()->getManager();

        $equipes = $em->getRepository('Gdr3625BackofficeBundle:Equipe')->findAll();
        $border=['borderBlue','borderOrange','borderRed','borderPurple','borderGreen'];
        $borderClass = $border[array_rand($border)];
        return $this->render('equipes.html.twig', array(
            'equipes' => $equipes,'borderClass' => $borderClass));
    }
    /**
     * @Route("/equipe/details", name="equipe_detail")
     */
    public function equipeDetailAction()
    {
        $em = $this->getDoctrine()->getManager();
        $equipes = $em->getRepository('Gdr3625BackofficeBundle:Equipe')->findAll();

        return $this->render('equipe_detail.html.twig', array(
            'equipes' => $equipes,));
    }

    /**
     * @Route("/flux/actus")
     */
    public function actusAction()
    {
        $em = $this->getDoctrine()->getManager();
        $fluxes = $em->getRepository('Gdr3625BackofficeBundle:Flux')->findBytype_flux('Actus');
        return $this->render('fluxActus.html.twig', array(
            'fluxes' => $fluxes,));

    }
    /**
     * @Route("/flux/actus/detail", name="actu_detail")
     */
    public function actusDetailAction()
    {
        $em = $this->getDoctrine()->getManager();
        $fluxes = $em->getRepository('Gdr3625BackofficeBundle:Flux')->findBytype_flux('Actus');

        return $this->render('fluxActus_detail.html.twig', array(
            'fluxes' => $fluxes,));

    }
    /**
     * @Route("/flux/jobs")
     */
    public function jobsAction()
    {

        return $this->render('fluxJobs.html.twig');
    }
    /**
     * @Route("/publications")
     */
    public function publicationsAction()
    {

        return $this->render('publications.html.twig');
    }
    /**
     * @Route("/brevets")
     */
    public function brevetsAction()
    {

        return $this->render('brevets.html.twig');
    }
}
