<?php

namespace App\Controller;



use App\Entity\Agent;
use App\Form\AgentType;
use App\Repository\AgentRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class HomePageController extends Controller
{
    /**
     * @Route("/", name="accueil")
     *
     *
     */
    public function indexAction()
    {
        return $this->render('HomePages/index.html.twig', []);

    }

    /**
     * @Route("/ajouter-agent", name="ajouterAgent")
     *
     */
    public function addAgentAction(Request $request)
    {
        $agent = new Agent();

        $form = $this->createForm(AgentType::class,$agent);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($agent);
            $em->flush();
            return $this->redirectToRoute('accueil');
        }

        return $this->render('HomePages/ajouterAgent.html.twig'
            ,[
            'agent' => $agent,
            'form' => $form->createView()
        ]);



        }

    /**
     * @Route("/lister-agents", name="listerAgents")
     *
     */
    public function listAgentsAction()
    {
        $em = $this->getDoctrine()->getRepository(Agent::class);

        $listeAgents = $em->findAll();

        return $this->render('HomePages/listerAgents.html.twig'
            ,[
                'listeagents' => $listeAgents,
            ]);



    }


}