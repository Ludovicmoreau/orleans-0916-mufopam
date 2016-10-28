<?php

namespace Gdr3625\BackofficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Equipe
 *
 * @ORM\Table(name="equipe")
 * @ORM\Entity(repositoryClass="Gdr3625\BackofficeBundle\Repository\EquipeRepository")
 */
class Equipe
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
     * @ORM\Column(name="nom_equipe", type="string", length=255)
     */
    private $nomEquipe;

    /**
     * @var string
     *
     * @ORM\Column(name="laboratoire", type="string", length=255)
     */
    private $laboratoire;

    /**
     * @var string
     *
     * @ORM\Column(name="rue", type="string", length=255)
     */
    private $rue;

    /**
     * @var int
     *
     * @ORM\Column(name="cp", type="integer")
     */
    private $cp;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="code_unite", type="string", length=255)
     */
    private $codeUnite;

    /**
     * @var string
     *
     * @ORM\Column(name="tutelle", type="string", length=255)
     */
    private $tutelle;

    /**
     * @var string
     *
     * @ORM\Column(name="site_web_equipe", type="string", length=255)
     */
    private $siteWebEquipe;

    /**
     * @var string
     *
     * @ORM\Column(name="site_web_labo", type="string", length=255)
     */
    private $siteWebLabo;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_referent", type="string", length=255)
     */
    private $nomReferent;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_referent", type="string", length=255)
     */
    private $prenomReferent;

    /**
     * @var string
     *
     * @ORM\Column(name="email_referent", type="string", length=255)
     */
    private $emailReferent;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone_referent", type="string", length=255)
     */
    private $telephoneReferent;

    /**
     * @var string
     *
     * @ORM\Column(name="recherche", type="string", length=255)
     */
    private $recherche;

    /**
     * @var string
     *
     * @ORM\Column(name="projet", type="string", length=255)
     */
    private $projet;

    /**
     * @var string
     *
     * @ORM\Column(name="description_equipe", type="text")
     */
    private $descriptionEquipe;

    /**
     * @var string
     *
     * @ORM\Column(name="logo", type="string", length=255, nullable=true)
     * @Assert\File(mimeTypes={ "image/jpg", "image/png", "image/jpeg", "image/jpeg"})
     */
    private $logo;

    /**
     * @ORM\OneToMany(targetEntity="Brevets", mappedBy="equipe")
     */
    protected $brevets;

    /**
     * @ORM\ManyToMany(targetEntity="Keywords", inversedBy="equipes", cascade={"persist"})
     */
    private $keywordsEquipe;

    /**
     * @ORM\ManyToMany(targetEntity="Publications", inversedBy="publicationEquipe")
     */
    private $equipePublication;

    /**
     * @ORM\ManyToMany(targetEntity="Brevets", inversedBy="brevetEquipe")
     */
    private $equipeBrevet;

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
     * Set nomEquipe
     *
     * @param string $nomEquipe
     * @return Equipe
     */
    public function setNomEquipe($nomEquipe)
    {
        $this->nomEquipe = $nomEquipe;

        return $this;
    }

    /**
     * Get nomEquipe
     *
     * @return string 
     */
    public function getNomEquipe()
    {
        return $this->nomEquipe;
    }

    /**
     * Set laboratoire
     *
     * @param string $laboratoire
     * @return Equipe
     */
    public function setLaboratoire($laboratoire)
    {
        $this->laboratoire = $laboratoire;

        return $this;
    }

    /**
     * Get laboratoire
     *
     * @return string 
     */
    public function getLaboratoire()
    {
        return $this->laboratoire;
    }

    /**
     * Set rue
     *
     * @param string $rue
     * @return Equipe
     */
    public function setRue($rue)
    {
        $this->rue = $rue;

        return $this;
    }

    /**
     * Get rue
     *
     * @return string 
     */
    public function getRue()
    {
        return $this->rue;
    }

    /**
     * Set cp
     *
     * @param integer $cp
     * @return Equipe
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return integer 
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return Equipe
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set codeUnite
     *
     * @param string $codeUnite
     * @return Equipe
     */
    public function setCodeUnite($codeUnite)
    {
        $this->codeUnite = $codeUnite;

        return $this;
    }

    /**
     * Get codeUnite
     *
     * @return string 
     */
    public function getCodeUnite()
    {
        return $this->codeUnite;
    }

    /**
     * Set tutelle
     *
     * @param string $tutelle
     * @return Equipe
     */
    public function setTutelle($tutelle)
    {
        $this->tutelle = $tutelle;

        return $this;
    }

    /**
     * Get tutelle
     *
     * @return string 
     */
    public function getTutelle()
    {
        return $this->tutelle;
    }

    /**
     * Set siteWebEquipe
     *
     * @param string $siteWebEquipe
     * @return Equipe
     */
    public function setSiteWebEquipe($siteWebEquipe)
    {
        $this->siteWebEquipe = $siteWebEquipe;

        return $this;
    }

    /**
     * Get siteWebEquipe
     *
     * @return string 
     */
    public function getSiteWebEquipe()
    {
        return $this->siteWebEquipe;
    }

    /**
     * Set siteWebLabo
     *
     * @param string $siteWebLabo
     * @return Equipe
     */
    public function setSiteWebLabo($siteWebLabo)
    {
        $this->siteWebLabo = $siteWebLabo;

        return $this;
    }

    /**
     * Get siteWebLabo
     *
     * @return string 
     */
    public function getSiteWebLabo()
    {
        return $this->siteWebLabo;
    }

    /**
     * Set nomReferent
     *
     * @param string $nomReferent
     * @return Equipe
     */
    public function setNomReferent($nomReferent)
    {
        $this->nomReferent = $nomReferent;

        return $this;
    }

    /**
     * Get nomReferent
     *
     * @return string 
     */
    public function getNomReferent()
    {
        return $this->nomReferent;
    }

    /**
     * Set prenomReferent
     *
     * @param string $prenomReferent
     * @return Equipe
     */
    public function setPrenomReferent($prenomReferent)
    {
        $this->prenomReferent = $prenomReferent;

        return $this;
    }

    /**
     * Get prenomReferent
     *
     * @return string 
     */
    public function getPrenomReferent()
    {
        return $this->prenomReferent;
    }

    /**
     * Set emailReferent
     *
     * @param string $emailReferent
     * @return Equipe
     */
    public function setEmailReferent($emailReferent)
    {
        $this->emailReferent = $emailReferent;

        return $this;
    }

    /**
     * Get emailReferent
     *
     * @return string 
     */
    public function getEmailReferent()
    {
        return $this->emailReferent;
    }

    /**
     * Set telephoneReferent
     *
     * @param string $telephoneReferent
     * @return Equipe
     */
    public function setTelephoneReferent($telephoneReferent)
    {
        $this->telephoneReferent = $telephoneReferent;

        return $this;
    }

    /**
     * Get telephoneReferent
     *
     * @return string 
     */
    public function getTelephoneReferent()
    {
        return $this->telephoneReferent;
    }

    /**
     * Set recherche
     *
     * @param string $recherche
     * @return Equipe
     */
    public function setRecherche($recherche)
    {
        $this->recherche = $recherche;

        return $this;
    }

    /**
     * Get recherche
     *
     * @return string 
     */
    public function getRecherche()
    {
        return $this->recherche;
    }

    /**
     * Set projet
     *
     * @param string $projet
     * @return Equipe
     */
    public function setProjet($projet)
    {
        $this->projet = $projet;

        return $this;
    }

    /**
     * Get projet
     *
     * @return string 
     */
    public function getProjet()
    {
        return $this->projet;
    }

    /**
     * Set descriptionEquipe
     *
     * @param string $descriptionEquipe
     * @return Equipe
     */
    public function setDescriptionEquipe($descriptionEquipe)
    {
        $this->descriptionEquipe = $descriptionEquipe;

        return $this;
    }

    /**
     * Get descriptionEquipe
     *
     * @return string 
     */
    public function getDescriptionEquipe()
    {
        return $this->descriptionEquipe;
    }

    /**
     * Set logo
     *
     * @param string $logo
     * @return Equipe
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string 
     */
    public function getLogo()
    {
        return $this->logo;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->brevets = new \Doctrine\Common\Collections\ArrayCollection();
        $this->keywordsEquipe = new \Doctrine\Common\Collections\ArrayCollection();
        $this->publications = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add brevets
     *
     * @param \Gdr3625\BackofficeBundle\Entity\Brevets $brevets
     * @return Equipe
     */
    public function addBrevet(\Gdr3625\BackofficeBundle\Entity\Brevets $brevets)
    {
        $this->brevets[] = $brevets;

        return $this;
    }

    /**
     * Remove brevets
     *
     * @param \Gdr3625\BackofficeBundle\Entity\Brevets $brevets
     */
    public function removeBrevet(\Gdr3625\BackofficeBundle\Entity\Brevets $brevets)
    {
        $this->brevets->removeElement($brevets);
    }

    /**
     * Get brevets
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBrevets()
    {
        return $this->brevets;
    }

    

    /**
     * Add publications
     *
     * @param \Gdr3625\BackofficeBundle\Entity\Publications $publications
     * @return Equipe
     */
    public function addPublication(\Gdr3625\BackofficeBundle\Entity\Publications $publications)
    {
        $this->publications[] = $publications;

        return $this;
    }

    /**
     * Remove publications
     *
     * @param \Gdr3625\BackofficeBundle\Entity\Publications $publications
     */
    public function removePublication(\Gdr3625\BackofficeBundle\Entity\Publications $publications)
    {
        $this->publications->removeElement($publications);
    }

    /**
     * Get publications
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPublications()
    {
        return $this->publications;
    }

    /**
     * Add keywordsEquipe
     *
     * @param \Gdr3625\BackofficeBundle\Entity\Keywords $keywordsEquipe
     * @return Equipe
     */
    public function addkeywordsEquipe(\Gdr3625\BackofficeBundle\Entity\Keywords $keywordsEquipe)
    {
        $this->keywordsEquipe[] = $keywordsEquipe;

        return $this;
    }

    /**
     * Remove keywordsEquipe
     *
     * @param \Gdr3625\BackofficeBundle\Entity\Keywords $keywordsEquipe
     */
    public function removekeywordsEquipe(\Gdr3625\BackofficeBundle\Entity\Keywords $keywordsEquipe)
    {
        $this->keywordsEquipe->removeElement($keywordsEquipe);
    }

    /**
     * Get keywordsEquipe
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getkeywordsEquipe()
    {
        return $this->keywordsEquipe;
    }
    
}
