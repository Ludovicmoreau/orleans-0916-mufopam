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
     * @return mixed
     */
    public function getPublicationEquipe()
    {
        return $this->publicationEquipe;
    }

    /**
     * @param mixed $publicationEquipe
     */
    public function setPublicationEquipe($publicationEquipe)
    {
        $this->publicationEquipe = $publicationEquipe;
    }

    

    /**
     * Add publicationEquipe
     *
     * @param \Gdr3625\BackofficeBundle\Entity\Equipe $publicationEquipe
     * @return Publications
     */
    public function addPublicationEquipe(\Gdr3625\BackofficeBundle\Entity\Equipe $publicationEquipe)
    {
        $this->publicationEquipe[] = $publicationEquipe;

        return $this;
    }

    /**
     * Remove publicationEquipe
     *
     * @param \Gdr3625\BackofficeBundle\Entity\Equipe $publicationEquipe
     */
    public function removePublicationEquipe(\Gdr3625\BackofficeBundle\Entity\Equipe $publicationEquipe)
    {
        $this->publicationEquipe->removeElement($publicationEquipe);
    }

}
