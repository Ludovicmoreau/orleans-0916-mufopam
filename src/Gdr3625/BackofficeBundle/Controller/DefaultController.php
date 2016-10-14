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
     * @Route("/equipes")
     */
    public function equipesAction()
    {
        return $this->render('equipes.html.twig');
    }

    /**
     * @Route("/flux/actus")
     */
    public function actusAction()
    {

        return $this->render('fluxActus.html.twig');
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
