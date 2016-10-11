<?php

namespace Gdr3625\BackofficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Flux_Keywords
 *
 * @ORM\Table(name="flux__keywords")
 * @ORM\Entity(repositoryClass="Gdr3625\BackofficeBundle\Repository\Flux_KeywordsRepository")
 */
class Flux_Keywords
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
     * @var int
     *
     * @ORM\Column(name="id_flux", type="integer")
     */
    private $idFlux;

    /**
     * @var int
     *
     * @ORM\Column(name="id_keyword", type="integer")
     */
    private $idKeyword;


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
     * Set idFlux
     *
     * @param integer $idFlux
     * @return Flux_Keywords
     */
    public function setIdFlux($idFlux)
    {
        $this->idFlux = $idFlux;

        return $this;
    }

    /**
     * Get idFlux
     *
     * @return integer 
     */
    public function getIdFlux()
    {
        return $this->idFlux;
    }

    /**
     * Set idKeyword
     *
     * @param integer $idKeyword
     * @return Flux_Keywords
     */
    public function setIdKeyword($idKeyword)
    {
        $this->idKeyword = $idKeyword;

        return $this;
    }

    /**
     * Get idKeyword
     *
     * @return integer 
     */
    public function getIdKeyword()
    {
        return $this->idKeyword;
    }
}
