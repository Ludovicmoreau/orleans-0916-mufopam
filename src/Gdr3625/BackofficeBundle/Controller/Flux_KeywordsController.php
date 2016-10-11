<?php

namespace Gdr3625\BackofficeBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Gdr3625\BackofficeBundle\Entity\Flux_Keywords;

/**
 * Flux_Keywords controller.
 *
 * @Route("/flux_keywords")
 */
class Flux_KeywordsController extends Controller
{
    /**
     * Lists all Flux_Keywords entities.
     *
     * @Route("/", name="flux_keywords_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $flux_Keywords = $em->getRepository('Gdr3625BackofficeBundle:Flux_Keywords')->findAll();

        return $this->render('flux_keywords/index.html.twig', array(
            'flux_Keywords' => $flux_Keywords,
        ));
    }

    /**
     * Finds and displays a Flux_Keywords entity.
     *
     * @Route("/{id}", name="flux_keywords_show")
     * @Method("GET")
     */
    public function showAction(Flux_Keywords $flux_Keyword)
    {

        return $this->render('flux_keywords/show.html.twig', array(
            'flux_Keyword' => $flux_Keyword,
        ));
    }
}
