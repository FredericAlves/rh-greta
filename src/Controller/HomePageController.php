<?php

namespace App\Controller;



use App\Entity\Agent;
use App\Entity\Contrat;
use App\Form\AgentType;
use App\Form\ContratType;
use Exporter\Handler;
use Exporter\Writer\CsvWriter;
use Exporter\Source\PDOStatementSourceIterator;
use PDO;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
            return $this->redirectToRoute('listerAgents');
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


        // Prepare the data source

//        $bdd = new PDO('mysql:host=localhost;dbname=rh_greta', 'root','');
//        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        $reponse = $bdd->query('SELECT nom, prenom, sexe, fonction FROM agent');
//
//        $source = new PDOStatementSourceIterator($reponse);
//
//        $writer = new CsvWriter('data.csv');
//
//        Handler::create($source, $writer)->export();


        return $this->render('HomePages/listerAgents.html.twig'
            ,[
                'listeagents' => $listeAgents,
            ]);



    }

    /**
     * @Route("/voir-agent/{id}", name="voirAgent")
     *
     */
    public function viewAgentsAction($id)
    {
        $em = $this->getDoctrine()->getRepository(Agent::class);

        $agent = $em->find($id);

        $em = $this->getDoctrine()->getRepository(Contrat::class);

        $contrats = $em->findBy(array('agent' => $id));

        if (null === $agent) {
            throw new NotFoundHttpException();
        }

        return $this->render('HomePages/voirAgent.html.twig'
            ,[
                'agent' => $agent,
                'contrats' => $contrats
            ]);



    }

    /**
     * @Route("/ajouter-contrat/{id}", name="ajouterContrat")
     *
     */
    public function addContratAction(Request $request, $id)
    {
        $contrat = new Contrat();

        $em = $this->getDoctrine()->getRepository(Agent::class);

        $agent = $em->find($id);

        $contrat->setAgent($agent);

        $form = $this->createForm(ContratType::class, $contrat);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $agent->addContrat($contrat);
            $em = $this->getDoctrine()->getManager();
            $em->persist($contrat);
            $em->persist($agent);
            $em->flush();
            return $this->redirectToRoute('voirAgent', array('id' => $id));
        }

        return $this->render('HomePages/ajouterContrat.html.twig'
            ,[
                'contrat' => $contrat,
                'form' => $form->createView()
            ]);



    }


}