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
        return $this->render('Gdr3625BackofficeBundle:Default:index.html.twig');
    }
}
