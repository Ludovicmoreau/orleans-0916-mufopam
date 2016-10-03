<?php

namespace Gdr3625\BackofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('Gdr3625BackofficeBundle:Default:index.html.twig');
    }
}
