<?php

namespace App\Controller;



use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class AdminPageController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     *
     *
     */
    public function indexAction()
    {
        return $this->render('AdminPages/admin.html.twig', []);

    }


}