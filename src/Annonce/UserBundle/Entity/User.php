<?php

/**
 * Created by IntelliJ IDEA.
 * User: Mednaceur
 * Date: 07/02/2016
 * Time: 15:29
 */
namespace Annonce\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Annonce\MainBundle\Entity\Favoris;
use Annonce\MainBundle\Entity\Message;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="Utilisateur")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="first_name", type="string", length=255)
     * @Assert\NotBlank(message="Please enter your Firstname.", groups={"Registration", "Profile"})
     */

    /**
     * @ORM\OneToOne(targetEntity="Annonce\UserBundle\Entity\Profile", cascade={"persist"})
     */
    private $profile;

    /**
     * @ORM\Column(name="joind_at" ,type="date")
     */
    protected $JoindAt;

    /**
     * @ORM\OneToMany(targetEntity="Annonce\MainBundle\Entity\Favoris" ,mappedBy="user")
     */
    private $favoris;

    /**
     * @return mixed
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * @param mixed $messages
     */
    public function setMessages($messages = null)
    {
        $this->messages = $messages;
    }

    /**
     * @ORM\OneToMany(targetEntity="Annonce\MainBundle\Entity\Message",mappedBy="user")
     */
    private $messages;

    /**
     * @return mixed
     */
    public function getFavoris()
    {
        return $this->favoris;
    }

    /**
     * @param mixed $favoris
     */
    public function setFavoris($favoris)
    {
        $this->favoris = $favoris;
    }



    /**
     * @ORM\OneToMany(targetEntity="Annonce\MainBundle\Entity\Annonce" ,mappedBy="user")
     */
    private $annonce;

    /**
     * @return mixed
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * @param mixed $profile
     */
    public function setProfile($profile)
    {
        $this->profile = $profile;
    }


    public function __construct()
    {
        parent::__construct();
        $this->JoindAt=new \DateTime();
        $this->messages=new ArrayCollection();
    }
    /**
     * @return mixed
     */
    public function getJoindAt()
    {
        return $this->JoindAt;
    }

    /**
     * @ORM\PrePersist()
     *
     */
    public function prePersist()
    {
        $this->JoindAt = new \DateTime;
    }

    /**
     * Set joindAt
     *
     * @param \DateTime $joindAt
     *
     * @return User
     */
    public function setJoindAt($joindAt)
    {
        $this->JoindAt = $joindAt;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAnnonce()
    {
        return $this->annonce;
    }

    /**
     * @param mixed $annonce
     */
    public function setAnnonce($annonce)
    {
        $this->annonce = $annonce;
    }


}
