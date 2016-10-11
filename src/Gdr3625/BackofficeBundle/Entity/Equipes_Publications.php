<?php

namespace Gdr3625\BackofficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Equipes_Publications
 *
 * @ORM\Table(name="equipes_publications")
 * @ORM\Entity(repositoryClass="Gdr3625\BackofficeBundle\Repository\Equipes_PublicationsRepository")
 */
class Equipes_Publications
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
     * @ORM\Column(name="id_publications", type="integer")
     */
    private $idPublications;

    /**
     * @var int
     *
     * @ORM\Column(name="id_equipes", type="integer")
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
