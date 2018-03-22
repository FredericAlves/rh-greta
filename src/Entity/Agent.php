<?php

namespace App\Entity;

use App\Repository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AgentRepository")
 */
class Agent
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDeCreation", type="datetime")
     *
     * @Assert\Date()
     */
    private $dateDeCreation;

    /**
     * @var String
     *
     * @ORM\Column(name="utilisateurCreateur", type="string", length=255, nullable=true)
     *
     */
    private $utilisateurCreateur;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDeModification", type="datetime", nullable=true)
     *
     * @Assert\Date()
     */
    private $dateDeModification;

    /**
     * @var String
     *
     * @ORM\Column(name="utilisateurModificateur", type="string", length=255, nullable=true)
     *
     */
    private $utilisateurModificateur;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     * @Assert\NotNull(message="Veuillez indiquer un nom de famille.")
     * @Assert\Length(
     *      min = 2,
     *      max = 40,
     *      minMessage = "Le nom doit contenir au minimum {{ limit }} caractères",
     *      maxMessage = "Le nom doit contenir au maximum {{ limit }} caractères"
     * )
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=false)
     * @Assert\NotNull(message="Veuillez indiquer un prénom.")
     * @Assert\Length(
     *      min = 2,
     *      max = 40,
     *      minMessage = "Le prénom doit contenir au minimum {{ limit }} caractères",
     *      maxMessage = "Le prénom doit contenir au maximum {{ limit }} caractères"
     * )
     */
    private $prenom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDeNaissance", type="date", nullable=false)
     * @Assert\NotNull(message="Veuillez indiquer une date de naissance.")
     */
    private $dateDeNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="sexe", type="string", length=5, nullable=false)
     * @Assert\NotNull(message="Veuillez indiquer le sexe de l'agent.")
     * @Assert\Choice(choices={"Homme", "Femme"}, message="Vous devez choisir une entrée valide.", strict=true)
     */
    private $sexe;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse1", type="string", length=255, nullable=true)
     */
    private $adresse1;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse2", type="string", length=255, nullable=true)
     */
    private $adresse2;

    /**
     * @var integer
     *
     * @ORM\Column(name="codePostal", type="integer", nullable=true)
     */
    private $codePostal;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255, nullable=true)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="fonction", type="string", nullable=false)
     *
     * @Assert\Choice(choices={"Assistante administrative", "Assistante de formation", "Formateur"}, message="Vous devez choisir une fonction valide.", strict=true)
     *
     */
    private $fonction;

    /**
     * @var string
     *
     * @ORM\Column(name="specialite", type="string", nullable=true)
     *
     *
     */
    private $specialite;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Contrat", mappedBy="agent", cascade={"persist"})
     */
    private $contrats;



    public function __construct()
    {
        $this->contrats = new ArrayCollection();
        $this->dateDeCreation = new \DateTime();
    }

    /**
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     *
     * @return \DateTime
     */
    public function getDateDeCreation()
    {
        return $this->dateDeCreation;
    }

    /**
     * @return String
     */
    public function getUtilisateurCreateur()
    {
        return $this->utilisateurCreateur;
    }

    /**
     * @return \DateTime
     */
    public function getDateDeModification()
    {
        return $this->dateDeModification;
    }

    /**
     * @param \DateTime $dateDeModification
     */
    public function setDateDeModification($dateDeModification)
    {
        $this->dateDeModification = $dateDeModification;
    }

    /**
     * @return String
     */
    public function getUtilisateurModificateur()
    {
        return $this->utilisateurModificateur;
    }

    /**
     * @param String $utilisateurModificateur
     */
    public function setUtilisateurModificateur($utilisateurModificateur)
    {
        $this->utilisateurModificateur = $utilisateurModificateur;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return \DateTime
     */
    public function getDateDeNaissance()
    {
        return $this->dateDeNaissance;
    }

    /**
     * @param \DateTime $dateDeNaissance
     */
    public function setDateDeNaissance($dateDeNaissance)
    {
        $this->dateDeNaissance = $dateDeNaissance;
    }

    /**
     * @return string
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * @param string $sexe
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;
    }

    /**
     * @return string
     */
    public function getAdresse1()
    {
        return $this->adresse1;
    }

    /**
     * @param string $adresse1
     */
    public function setAdresse1($adresse1)
    {
        $this->adresse1 = $adresse1;
    }

    /**
     * @return string
     */
    public function getAdresse2()
    {
        return $this->adresse2;
    }

    /**
     * @param string $adresse2
     */
    public function setAdresse2($adresse2)
    {
        $this->adresse2 = $adresse2;
    }

    /**
     * @return int
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * @param int $codePostal
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;
    }

    /**
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param string $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    /**
     * @return string
     */
    public function getFonction()
    {
        return $this->fonction;
    }

    /**
     * @param string $fonction
     */
    public function setFonction($fonction)
    {
        $this->fonction = $fonction;
    }

    /**
     * @return string
     */
    public function getSpecialite()
    {
        return $this->specialite;
    }

    /**
     * @param string $specialite
     */
    public function setSpecialite($specialite)
    {
        $this->specialite = $specialite;
    }

    /**
     * Add contrat
     *
     * @param Contrat $contrat
     *
     * @return Contrat
     */

    public function addContrat(Contrat $contrat)
    {
        $this->contrats[] = $contrat;
        $contrat->setAgent($this);
        return $this;
    }





}
