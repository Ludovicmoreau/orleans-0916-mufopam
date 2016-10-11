<?php

namespace Gdr3625\BackofficeBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Gdr3625\BackofficeBundle\Entity\Equipes_Keywords;

/**
 * Equipes_Keywords controller.
 *
 * @Route("/equipes_keywords")
 */
class Equipes_KeywordsController extends Controller
{
    /**
     * Lists all Equipes_Keywords entities.
     *
     * @Route("/", name="equipes_keywords_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $equipes_Keywords = $em->getRepository('Gdr3625BackofficeBundle:Equipes_Keywords')->findAll();

        return $this->render('equipes_keywords/index.html.twig', array(
            'equipes_Keywords' => $equipes_Keywords,
        ));
    }

    /**
     * Finds and displays a Equipes_Keywords entity.
     *
     * @Route("/{id}", name="equipes_keywords_show")
     * @Method("GET")
     */
    public function showAction(Equipes_Keywords $equipes_Keyword)
    {

        return $this->render('equipes_keywords/show.html.twig', array(
            'equipes_Keyword' => $equipes_Keyword,
        ));
    }
}
