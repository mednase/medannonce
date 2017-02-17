<?php

namespace Annonce\MainBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Annonce
 *
 * @ORM\Table(name="annonce")
 * @ORM\Entity(repositoryClass="Annonce\MainBundle\Repository\AnnonceRepository")
 */
class Annonce
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
     * @Assert\NotBlank()
     */
    private $titre;

    /**
     * @ORM\Column(name="Description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="gouvernorat", type="string", length=40,)
     */
    private $gouvernorat;

    /**
     * @var string
     *
     * @ORM\Column(name="Adresse", type="string", length=255)
     */
    private $adresse;


    /**
     * @ORM\ManyToOne(targetEntity="Annonce\MainBundle\Entity\SousCategories",inversedBy="annonce")
     */
    private $categorie;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateAjout", type="datetime")
     */
    private $date_ajout;

    /**
     * @ORM\OneToMany(targetEntity="Annonce\MainBundle\Entity\Favoris",mappedBy="annonce")
     */
    private $favoris;
    /**
     * @ORM\ManyToOne(targetEntity="Annonce\UserBundle\Entity\User" ,inversedBy="annonce")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="Annonce\MainBundle\Entity\image",mappedBy="annonce",cascade={"persist"})
     */
    protected $images;

    /**
     * @ORM\OneToMany(targetEntity="Annonce\MainBundle\Entity\Commentaire", mappedBy="annonce")
     */
    private $commentaires;

    /**
     * @var float
     *
     * @ORM\Column(name="Prix", type="float")
     */
    private $prix;

    /**
     * @return mixed
     */
    public function getObjAnnonce()
    {
        return $this->objAnnonce;
    }

    /**
     * @param mixed $objAnnonce
     */
    public function setObjAnnonce($objAnnonce)
    {
        $this->objAnnonce = $objAnnonce;
    }

    /**
     * @ORM\OneToOne(targetEntity="Annonce\MainBundle\Entity\ObjetAnnonce",cascade={"persist","remove"})
     */
    private $objAnnonce;


    /**
     * Annonce constructor.
     */
    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->date_ajout = new \DateTime();
    }


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
     * @return mixed
     */
    public function getCommentaires()
    {
        return $this->commentaires;
    }

    /**
     * @param mixed $commentaires
     */
    public function setCommentaires($commentaires)
    {
        $this->commentaires = $commentaires;
    }




    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param mixed $categorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }



    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Annonce
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Annonce
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set gouvernorat
     *
     * @param string $gouvernorat
     *
     * @return Annonce
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
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Annonce
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
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
     * Set prix
     *
     * @param float $prix
     *
     * @return Annonce
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }


    /**
     * @return Date
     */
    public function getDateAjout()
    {
        return $this->date_ajout;
    }

    /**
     * @param Date $date_ajout
     */
    public function setDateAjout($date_ajout)
    {
        $this->date_ajout = $date_ajout;
    }

    // setters et getters standards...

    /**
     * Add images
     *
     * @param \Annonce\MainBundle\Entity\Image $images
     * @return Annonce
     */
    public function addImage(Image $images)
    {
        $this->images[] = $images;

        return $this;
    }

    /**
     * Remove images
     *
     * @param \Annonce\MainBundle\Entity\Image $images
     */
    public function removeImage(Image $images)
    {
        $this->images->removeElement($images);
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImages()
    {
        return $this->images;
    }

    public function removeEmptyImage()
    {
        foreach ($this->getImages() as $images) {
            if ($images->getFile() === null) {
                $this->removeImage($images);
            }
        }
    }


    /**
     * @return boolean
     */
    public function HasObject(){
        if($this->objAnnonce!=null)
            return true;

        return false;
    }
}

