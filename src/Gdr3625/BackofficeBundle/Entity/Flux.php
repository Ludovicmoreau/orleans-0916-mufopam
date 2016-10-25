<?php

namespace Gdr3625\BackofficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Flux
 *
 * @ORM\Table(name="flux")
 * @ORM\Entity(repositoryClass="Gdr3625\BackofficeBundle\Repository\FluxRepository")
 */
class Flux
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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_publication", type="datetime")
     */
    private $datePublication;

    /**
     * @var string
     *
     * @ORM\Column(name="type_flux", type="string", length=255, nullable=false)
     */
    private $typeFlux;
    
    /**
     * @ORM\ManyToMany(targetEntity="Keywords", inversedBy="fluxes")
     */
    private $keywordsflux;


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
     * Set datePublication
     *
     * @param \DateTime $datePublication
     * @return Flux
     */

    public function setDatePublication($datePublication='')
    {
        if (!$datePublication) {
            $datePublication = new \DateTime('now');
        }
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
     * Constructor
     */
    public function __construct()
    {
        $this->keywords = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add keywords
     *
     * @param \Gdr3625\BackofficeBundle\Entity\Keywords $keywords
     * @return Flux
     */
    public function addKeyword(\Gdr3625\BackofficeBundle\Entity\Keywords $keywords)
    {
        $this->keywords[] = $keywords;

        return $this;
    }

    /**
     * Remove keywords
     *
     * @param \Gdr3625\BackofficeBundle\Entity\Keywords $keywords
     */
    public function removeKeyword(\Gdr3625\BackofficeBundle\Entity\Keywords $keywords)
    {
        $this->keywords->removeElement($keywords);
    }

    /**
     * Get keywords
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * Add keywordsflux
     *
     * @param \Gdr3625\BackofficeBundle\Entity\Keywords $keywordsflux
     * @return Flux
     */
    public function addKeywordsflux(\Gdr3625\BackofficeBundle\Entity\Keywords $keywordsflux)
    {
        $this->keywordsflux[] = $keywordsflux;

        return $this;
    }

    /**
     * Remove keywordsflux
     *
     * @param \Gdr3625\BackofficeBundle\Entity\Keywords $keywordsflux
     */
    public function removeKeywordsflux(\Gdr3625\BackofficeBundle\Entity\Keywords $keywordsflux)
    {
        $this->keywordsflux->removeElement($keywordsflux);
    }

    /**
     * Get keywordsflux
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getKeywordsflux()
    {
        return $this->keywordsflux;
    }

}
