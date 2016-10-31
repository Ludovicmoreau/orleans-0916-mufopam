<?php

namespace Gdr3625\BackofficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Keywords
 *
 * @ORM\Table(name="keywords")
 * @ORM\Entity(repositoryClass="Gdr3625\BackofficeBundle\Repository\KeywordsRepository")
 */
class Keywords
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
     * @ORM\Column(name="keyword", type="string", length=255)
     */
    private $keyword;

    /**
     * @ORM\ManyToMany(targetEntity="Equipe", mappedBy="keywordsEquipe")
     * @ORM\JoinColumn(name="equipe_id", referencedColumnName="id")
     */
    public $equipes;

    /**
     * @ORM\ManyToMany(targetEntity="Flux", mappedBy="keywordsflux")
     */
    private $fluxes;


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
     * Set keyword
     *
     * @param string $keyword
     * @return Keywords
     */
    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;

        return $this;
    }

    /**
     * Get keyword
     *
     * @return string 
     */
    public function getKeyword()
    {
        return $this->keyword;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->equipes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();


    }

    /**
     * Add equipes
     *
     * @param \Gdr3625\BackofficeBundle\Entity\Equipe $equipes
     * @return Keywords
     */
    public function addEquipe(\Gdr3625\BackofficeBundle\Entity\Equipe $equipes)
    {
        $this->equipes[] = $equipes;

        return $this;
    }

    /**
     * Remove equipes
     *
     * @param \Gdr3625\BackofficeBundle\Entity\Equipes $equipes
     */
    public function removeEquipe(\Gdr3625\BackofficeBundle\Entity\Equipe $equipes)
    {
        $this->equipes->removeElement($equipes);
    }

    /**
     * Get equipes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEquipe()
    {
        return $this->equipes;
    }

    /**
     * Add fluxes
     *
     * @param \Gdr3625\BackofficeBundle\Entity\Flux $fluxes
     * @return Keywords
     */
    public function addFlux(\Gdr3625\BackofficeBundle\Entity\Flux $fluxes)
    {
        $this->fluxes[] = $fluxes;

        return $this;
    }

    /**
     * Remove fluxes
     *
     * @param \Gdr3625\BackofficeBundle\Entity\Flux $fluxes
     */
    public function removeFlux(\Gdr3625\BackofficeBundle\Entity\Flux $fluxes)
    {
        $this->fluxes->removeElement($fluxes);
    }

    /**
     * Get fluxes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFluxes()
    {
        return $this->fluxes;
    }
}
