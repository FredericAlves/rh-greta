<?php

namespace App\Controller;



use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class HomePageController extends AbstractController
{
    /**
     * @Route("/")
     *
     *
     */
    public function indexAction()
    {
        return $this->render('HomePages/index.html.twig', []);

    }


}