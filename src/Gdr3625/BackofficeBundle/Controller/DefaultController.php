<?php

namespace Gdr3625\BackofficeBundle\Controller;

use Gdr3625\BackofficeBundle\Gdr3625BackofficeBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Gdr3625\BackofficeBundle\Entity\Publications;
use Symfony\Component\HttpFoundation\File\File;

class DefaultController extends Controller
{
    /**
     * @Route("/back", name="back")
     */
    public function indexAction()
    {
        return $this->render('base_backoffice.html.twig');
    }

    /**
     * @Route("/", name="accueil")
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

        return $this->render('Gdr3625BackofficeBundle::equipes.html.twig', array(
            'equipes' => $equipes));
    }
    /**
     * @Route("/equipe/detail/{id}", name="equipe_detail")
     */
    public function equipeDetailAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $equipe = $em->getRepository('Gdr3625BackofficeBundle:Equipe')->findOneById($id);
        //$brevets = $em->getRepository('Gdr3625BackofficeBundle:Brevets')->findOneById($id);
        //$publications = $em->getRepository('Gdr3625BackofficeBundle:Publications')->findOneById($id);
        return $this->render('Gdr3625BackofficeBundle::equipe_detail.html.twig', array(
            'equipe' => $equipe, ));//'brevets'=>$brevets, 'publications'=>$publications,));
    }

    /**
     * @Route("/flux/actus", name="actus")
     */
    public function actusAction()
    {
        $em = $this->getDoctrine()->getManager();
        $fluxes = $em->getRepository('Gdr3625BackofficeBundle:Flux')->findBytype_flux('Actus');
        return $this->render('Gdr3625BackofficeBundle::fluxActus.html.twig', array(
            'fluxes' => $fluxes));
    }

    /**
     * @Route("/flux/actus/detail/{id}", name="actu_detail")
     */
    public function actusDetailAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $fluxes = $em->getRepository('Gdr3625BackofficeBundle:Flux')->findOneByid($id);
        $tab = ['primary','success','warning','default','info','danger'];
        $couleur = $tab[array_rand($tab)];
        return $this->render('Gdr3625BackofficeBundle::fluxActus_detail.html.twig', array(
            'fluxes' => $fluxes, 'couleur' => $couleur));

    }
    /**
     * @Route("/flux/jobs", name="jobs")
     */
    public function jobsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $fluxes = $em->getRepository('Gdr3625BackofficeBundle:Flux')->findBytype_flux('Jobs');
        return $this->render('Gdr3625BackofficeBundle::fluxJobs.html.twig', array(
            'fluxes' => $fluxes));
    }
    /**
     * @Route("/publications", name="publications")
     */
    public function publicationsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $dois = $em->getRepository('Gdr3625BackofficeBundle:Publications')->findAll();
        foreach ($dois as $key=>$doi) {
                $json = file_get_contents('http://api.crossref.org/works/'.$dois[$key]->getDoi());
                $publications[]=json_decode($json,true);
        }
        return $this->render('Gdr3625BackofficeBundle::publications.html.twig', array(
            'publications'=>$publications));
    }
    /**
     * @Route("/brevets", name="brevets")
     */
    public function brevetsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $brevets = $em->getRepository('Gdr3625BackofficeBundle:Brevets')->findAll();
        return $this->render('Gdr3625BackofficeBundle::brevets.html.twig', array(
            'brevets'=>$brevets));
    }

    /**
     * @Route("/users")
     */
    public function userAction()
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('Gdr3625BackofficeBundle:User')->findAll();

        return $this->render('index.html.twig', array(
            'users' => $users));
    }

    public function helloAction($userId)
    {
        $em = $this->getDoctrine()->getManager();
        $userName = $em->getRepository('Gdr3625BackofficeBundle:User')->findOneBy($userId);

        return $this->getUser()-> getUsername();
    }
}
