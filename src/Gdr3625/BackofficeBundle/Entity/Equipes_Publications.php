<?php

namespace Gdr3625\BackofficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Equipes_Publications
 */
class Equipes_Publications
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $idPublications;

    /**
     * @var int
     */
    private $idEquipes;


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
     * Set idPublications
     *
     * @param integer $idPublications
     * @return Equipes_Publications
     */
    public function setIdPublications($idPublications)
    {
        $this->idPublications = $idPublications;

        return $this;
    }

    /**
     * Get idPublications
     *
     * @return integer 
     */
    public function getIdPublications()
    {
        return $this->idPublications;
    }

    /**
     * Set idEquipes
     *
     * @param integer $idEquipes
     * @return Equipes_Publications
     */
    public function setIdEquipes($idEquipes)
    {
        $this->idEquipes = $idEquipes;

        return $this;
    }

    /**
     * Get idEquipes
     *
     * @return integer 
     */
    public function getIdEquipes()
    {
        return $this->idEquipes;
    }
}
