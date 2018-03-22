<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity(repositoryClass="App\Repository\ContratRepository")
 */
class Contrat
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
     * @var String
     *
     * @ORM\Column(name="greta", type="string", length=128)
     *
     */
    private $greta;

    /**
     * @var string
     *
     * @ORM\Column(name="typeDuree", type="string", length=5, nullable=false)
     * @Assert\NotNull(message="Veuillez indiquer le type de contrat.")
     * @Assert\Choice(choices={"CDI", "CDD"}, message="Vous devez choisir une entrée valide.", strict=true)
     */
    private $typeDuree;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Agent", inversedBy="contrats"))
     * @ORM\JoinColumn(nullable=false)
     */
    private $agent;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Avenant", mappedBy="contrat", cascade={"persist"})
     */
    private $avenants;



    public function __construct()
    {
        $this->avenants = new ArrayCollection();
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
     * @return mixed
     */
    public function getTypeDuree()
    {
        return $this->typeDuree;
    }

    /**
     * @param mixed $typeDuree
     */
    public function setTypeDuree($typeDuree)
    {
        $this->typeDuree = $typeDuree;
    }

    /**
     * @return mixed
     */
    public function getAgent()
    {
        return $this->agent;
    }

    /**
     * Set agent
     *
     * @param Agent $agent
     *
     * @return Contrat
     */

    public function setAgent(Agent $agent)
    {
        $this->agent = $agent;
        return $this;
    }



    /**
     * @return String
     */
    public function getGreta()
    {
        return $this->greta;
    }

    /**
     * @param String $greta
     */
    public function setGreta($greta)
    {
        $this->greta = $greta;
    }
}
