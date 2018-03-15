<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AvenantRepository")
 */
class Avenant
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
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
     * @ORM\Column(name="utilisateurCreateur", type="string", length=255, nullable=false)
     *
     */
    private $utilisateurCreateur;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDeModification", type="datetime")
     *
     * @Assert\Date()
     */
    private $dateDeModification;

    /**
     * @var String
     *
     * @ORM\Column(name="utilisateurModificateur", type="string", length=255)
     *
     */
    private $utilisateurModificateur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Contrat", inversedBy="avenants"))
     * @ORM\JoinColumn(nullable=false)
     */
    private $contrat;



    public function __construct()
    {

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

}
