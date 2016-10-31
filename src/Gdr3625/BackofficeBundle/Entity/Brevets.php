<?php

namespace Gdr3625\BackofficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Brevets
 *
 * @ORM\Table(name="brevets")
 * @ORM\Entity(repositoryClass="Gdr3625\BackofficeBundle\Repository\BrevetsRepository")
 */
class Brevets
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
     * @ORM\Column(name="brevet", type="text")
     */
    private $brevet;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="text")
     */
    private $titre;

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
     * Set brevet
     *
     * @param string $brevet
     * @return Brevets
     */
    public function setBrevet($brevet)
    {
        $this->brevet = $brevet;

        return $this;
    }

    /**
     * Get brevet
     *
     * @return string 
     */
    public function getBrevet()
    {
        return $this->brevet;
    }

    /**
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }
    

}
