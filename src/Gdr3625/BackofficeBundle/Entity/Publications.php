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
}
