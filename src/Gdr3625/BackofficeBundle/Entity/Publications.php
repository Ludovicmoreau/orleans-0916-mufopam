<?php

namespace Gdr3625\BackofficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Publications
 *
 * @ORM\Table(name="publications")
 * @ORM\Entity(repositoryClass="Gdr3625\BackofficeBundle\Repository\PublicationsRepository")
 */
class Publications
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="doi", type="string", length=255)
     */
    private $doi;
    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;
    /**
     * @var string
     *
     * @ORM\Column(name="date", type="string", length=255)
     */
    private $date;
    /**
     * @var string
     *
     * @ORM\Column(name="auteur", type="text")
     */
    private $auteur;
    /**
     * @var string
     *
     * @ORM\Column(name="revue", type="text")
     */
    private $revue;
    /**
     * @var string
     *
     * @ORM\Column(name="lien", type="text")
     */
    private $lien;



    /**
     * @ORM\ManyToMany(targetEntity="Equipe", mappedBy="equipePublication")
     */
    private $publicationEquipe;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set doi
     *
     * @param string $doi
     * @return Publications
     */
    public function setDoi($doi)
    {
        $this->doi = $doi;

        return $this;
    }

    /**
     * Get doi
     *
     * @return string 
     */
    public function getDoi()
    {
        return $this->doi;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->equipes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add equipes
     *
     * @param \Gdr3625\BackofficeBundle\Entity\Publications $equipes
     * @return Publications
     */
    public function addEquipe(\Gdr3625\BackofficeBundle\Entity\Publications $equipes)
    {
        $this->equipes[] = $equipes;

        return $this;
    }

    /**
     * Remove equipes
     *
     * @param \Gdr3625\BackofficeBundle\Entity\Publications $equipes
     */
    public function removeEquipe(\Gdr3625\BackofficeBundle\Entity\Publications $equipes)
    {
        $this->equipes->removeElement($equipes);
    }

    /**
     * Get equipes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEquipes()
    {
        return $this->equipes;
    }
    /**
     * Set titre
     *
     * @param string $titre
     * @return Publications
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set date
     *
     * @param string $date
     * @return Publications
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set auteur
     *
     * @param string $auteur
     * @return Publications
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get auteur
     *
     * @return string
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Set revue
     *
     * @param string $revue
     * @return Publications
     */
    public function setRevue($revue)
    {
        $this->revue = $revue;

        return $this;
    }

    /**
     * Get revue
     *
     * @return string
     */
    public function getRevue()
    {
        return $this->revue;
    }

    /**
     * Set lien
     *
     * @param string $lien
     * @return Publications
     */
    public function setLien($lien)
    {
        $this->lien = $lien;

        return $this;
    }

    /**
     * Get lien
     *
     * @return string
     */
    public function getLien()
    {
        return $this->lien;
    }
}
