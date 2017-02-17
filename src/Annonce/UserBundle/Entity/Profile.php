<?php

namespace Annonce\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Profile
 *
 * @ORM\Table(name="profile")
 * @ORM\Entity(repositoryClass="Annonce\UserBundle\Repository\ProfileRepository")
 */
class Profile
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
     * @ORM\Column(name="Nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var \DateTime
     * @ORM\Column(name="date_naissance", type="date")
     */
    private $date_naissance;

    /**
     * @var string
     *
     * @ORM\Column(name="Genre", type="string", length=6)
     * @Assert\Choice(choices = {"Homme","femme"}, multiple = false, message = "Tu dois Choisir Ton Genre")
     */
    private $genre;

    /**
     * @var int
     *
     * @ORM\Column(name="telephone", type="integer", unique=true)
     */
    private $telephone;



    /**
     * @ORM\OneToOne(targetEntity="Annonce\UserBundle\Entity\Photo" ,cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $photo;

    /**
     * @var string
     *
     * @ORM\Column(name="Adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="Gouvernorat", type="string", length=255)
     */
    private $gouvernorat;

    /**
     * @var int
     *
     * @ORM\Column(name="code_postale", type="integer")
     */
    private $codePostale;

    /**
     * @var string
     *
     * @ORM\Column(name="Facebok", type="string", length=255, nullable=true)
     */
    private $facebok;

    /**
     * @var string
     *
     * @ORM\Column(name="skype", type="string", length=255, nullable=true)
     */
    private $skype;

    /**
     * @var string
     *
     * @ORM\Column(name="twitter", type="string", length=255, nullable=true)
     */
    private $twitter;


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
     * Set nom
     *
     * @param string $nom
     *
     * @return Profile
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Profile
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @return date
     */
    public function getDateNaissance()
    {
        return $this->date_naissance;
    }

    /**
     * @param date $date_naissance
     */
    public function setDateNaissance($date_naissance)
    {
        $this->date_naissance = $date_naissance;
    }


    /**
     * Set genre
     *
     * @param string $genre
     *
     * @return Profile
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return string
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set telephone
     *
     * @param integer $telephone
     *
     * @return Profile
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return int
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Profile
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * @return string
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set gouvernorat
     *
     * @param string $gouvernorat
     *
     * @return Profile
     */
    public function setGouvernorat($gouvernorat)
    {
        $this->gouvernorat = $gouvernorat;

        return $this;
    }

    /**
     * Get gouvernorat
     *
     * @return string
     */
    public function getGouvernorat()
    {
        return $this->gouvernorat;
    }

    /**
     * Set codePostale
     *
     * @param integer $codePostale
     *
     * @return Profile
     */
    public function setCodePostale($codePostale)
    {
        $this->codePostale = $codePostale;

        return $this;
    }

    /**
     * Get codePostale
     *
     * @return int
     */
    public function getCodePostale()
    {
        return $this->codePostale;
    }

    /**
     * Set facebok
     *
     * @param string $facebok
     *
     * @return Profile
     */
    public function setFacebok($facebok)
    {
        $this->facebok = $facebok;

        return $this;
    }

    /**
     * Get facebok
     *
     * @return string
     */
    public function getFacebok()
    {
        return $this->facebok;
    }

    /**
     * Set skype
     *
     * @param string $skype
     *
     * @return Profile
     */
    public function setSkype($skype)
    {
        $this->skype = $skype;

        return $this;
    }

    /**
     * Get skype
     *
     * @return string
     */
    public function getSkype()
    {
        return $this->skype;
    }

    /**
     * Set twitter
     *
     * @param string $twitter
     *
     * @return Profile
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;

        return $this;
    }

    /**
     * Set image
     *
     * @param \Annonce\UserBundle\Entity\Photo $photo
     * @return Profile
     */
    public function setPhoto(Photo $photo)
    {
        $this->photo = $photo;
        return $this;
    }
    /**
     * Get image
     *
     * @return \Annonce\UserBundle\Entity\Photo
     */
    public function getPhoto()
    {
        return $this->photo;
    }
}

