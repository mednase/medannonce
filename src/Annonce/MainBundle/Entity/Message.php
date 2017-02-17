<?php

namespace Annonce\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table(name="message")
 * @ORM\Entity(repositoryClass="Annonce\MainBundle\Repository\MessageRepository")
 */
class Message
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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $Titre;

    /**
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEnvoi", type="datetime")
     */
    private $dateEnvoi;

    /**
     * @ORM\ManyToOne(targetEntity="Annonce\UserBundle\Entity\User" ,inversedBy="user")
     */
    private $source;

    /**
     * @var boolean
     * @ORM\Column(name="vue" ,type="boolean")
     */
    private $vue;

    /**
     * Message constructor.
     */
    public function __construct()
    {
        $this->dateEnvoi = new \DateTime();
        $this->vue=false;
    }

    /**
     * @return string
     */
    public function getTitre()
    {
        return $this->Titre;
    }

    /**
     * @param string $Titre
     */
    public function setTitre($Titre)
    {
        $this->Titre = $Titre;
    }

    /**
     * @return mixed
     */
    public function getVue()
    {
        return $this->vue;
    }

    /**
     * @param mixed $vue
     */
    public function setVue($vue)
    {
        $this->vue = $vue;
    }

    /**
     * @return mixed
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param mixed $source
     */
    public function setSource($source)
    {
        $this->source = $source;
    }

    /**
     * @return mixed
     */
    public function getDistinateur()
    {
        return $this->distinateur;
    }

    /**
     * @param mixed $distinateur
     */
    public function setDistinateur($distinateur)
    {
        $this->distinateur = $distinateur;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Annonce\UserBundle\Entity\User",inversedBy="user")
     */
    private $distinateur;





    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     *
     * @return Message
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set dateEnvoi
     *
     * @param \DateTime $dateEnvoi
     *
     * @return Message
     */
    public function setDateEnvoi($dateEnvoi)
    {
        $this->dateEnvoi = $dateEnvoi;

        return $this;
    }

    /**
     * Get dateEnvoi
     *
     * @return \DateTime
     */
    public function getDateEnvoi()
    {
        return $this->dateEnvoi;
    }

    /**
     * @ORM\PrePersist()
     *
     */
    public function prePersist()
    {
        $this->dateEnvoi = new \DateTime;
    }
}

