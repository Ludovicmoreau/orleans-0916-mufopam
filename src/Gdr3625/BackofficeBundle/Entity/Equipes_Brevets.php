<?php

namespace Gdr3625\BackofficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Equipes_Brevets
 *
 * @ORM\Table(name="equipes__brevets")
 * @ORM\Entity(repositoryClass="Gdr3625\BackofficeBundle\Repository\Equipes_BrevetsRepository")
 */
class Equipes_Brevets
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
     * @ORM\Column(name="id_brevets", type="integer")
     */
    private $idBrevets;

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
     * Set idBrevets
     *
     * @param integer $idBrevets
     * @return Equipes_Brevets
     */
    public function setIdBrevets($idBrevets)
    {
        $this->idBrevets = $idBrevets;

        return $this;
    }

    /**
     * Get idBrevets
     *
     * @return integer 
     */
    public function getIdBrevets()
    {
        return $this->idBrevets;
    }

    /**
     * Set idEquipes
     *
     * @param integer $idEquipes
     * @return Equipes_Brevets
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
