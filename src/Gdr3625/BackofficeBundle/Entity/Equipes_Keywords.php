<?php

namespace Gdr3625\BackofficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Equipes_Keywords
 *
 * @ORM\Table(name="equipes__keywords")
 * @ORM\Entity(repositoryClass="Gdr3625\BackofficeBundle\Repository\Equipes_KeywordsRepository")
 */
class Equipes_Keywords
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
     * @ORM\Column(name="id_equipes", type="integer")
     */
    private $idEquipes;

    /**
     * @var int
     *
     * @ORM\Column(name="id_keywords", type="integer")
     */
    private $idKeywords;


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
     * Set idEquipes
     *
     * @param integer $idEquipes
     * @return Equipes_Keywords
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

    /**
     * Set idKeywords
     *
     * @param integer $idKeywords
     * @return Equipes_Keywords
     */
    public function setIdKeywords($idKeywords)
    {
        $this->idKeywords = $idKeywords;

        return $this;
    }

    /**
     * Get idKeywords
     *
     * @return integer 
     */
    public function getIdKeywords()
    {
        return $this->idKeywords;
    }
}
