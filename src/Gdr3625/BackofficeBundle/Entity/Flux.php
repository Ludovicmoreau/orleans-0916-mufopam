<?php

namespace Gdr3625\BackofficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Flux
 */
class Flux
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $titre;

    /**
     * @var string
     */
    private $contenu;

    /**
     * @var int
     */
    private $auteur;

    /**
     * @var \DateTime
     */
    private $datePublication;

    /**
     * @var string
     */
    private $typeFlux;

    /**
     * @var string
     */
    private $tags;


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
     * Set titre
     *
     * @param string $titre
     * @return Flux
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
     * Set contenu
     *
     * @param string $contenu
     * @return Flux
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string 
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set auteur
     *
     * @param integer $auteur
     * @return Flux
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get auteur
     *
     * @return integer 
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Set datePublication
     *
     * @param \DateTime $datePublication
     * @return Flux
     */
    public function setDatePublication($datePublication)
    {
        $this->datePublication = $datePublication;

        return $this;
    }

    /**
     * Get datePublication
     *
     * @return \DateTime 
     */
    public function getDatePublication()
    {
        return $this->datePublication;
    }

    /**
     * Set typeFlux
     *
     * @param string $typeFlux
     * @return Flux
     */
    public function setTypeFlux($typeFlux)
    {
        $this->typeFlux = $typeFlux;

        return $this;
    }

    /**
     * Get typeFlux
     *
     * @return string 
     */
    public function getTypeFlux()
    {
        return $this->typeFlux;
    }

    /**
     * Set tags
     *
     * @param string $tags
     * @return Flux
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get tags
     *
     * @return string 
     */
    public function getTags()
    {
        return $this->tags;
    }
}
