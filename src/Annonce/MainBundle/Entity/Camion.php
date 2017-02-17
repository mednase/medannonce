<?php
/**
 * Created by IntelliJ IDEA.
 * User: medna
 * Date: 10/04/2016
 * Time: 01:49
 */

namespace Annonce\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Camion
 * @ORM\Entity
 */
class Camion extends ObjetAnnonce
{
    /**
     * @var string
     *
     * @ORM\Column(name="marque", type="string", length=255)
     */
    private $Marque;

    /**
     * @var string
     *
     * @ORM\Column(name="modele", type="string", length=255)
     */
    private $Modele;


    /**
     * @var string
     *
     * @ORM\Column(name="annee", type="string", length=255)
     */
    private $Annee;

    /**
     * @var string
     *
     * @ORM\Column(name="kilometrage", type="string", length=255)
     */
    private $Kilometrage;

    /**
     * @return string
     */
    public function getMarque()
    {
        return $this->Marque;
    }

    /**
     * @param string $Marque
     */
    public function setMarque($Marque)
    {
        $this->Marque = $Marque;
    }

    /**
     * @return string
     */
    public function getModele()
    {
        return $this->Modele;
    }

    /**
     * @param string $Modele
     */
    public function setModele($Modele)
    {
        $this->Modele = $Modele;
    }

    /**
     * @return string
     */
    public function getAnnee()
    {
        return $this->Annee;
    }

    /**
     * @param string $Annee
     */
    public function setAnnee($Annee)
    {
        $this->Annee = $Annee;
    }

    /**
     * @return string
     */
    public function getKilometrage()
    {
        return $this->Kilometrage;
    }

    /**
     * @param string $Kilometrage
     */
    public function setKilometrage($Kilometrage)
    {
        $this->Kilometrage = $Kilometrage;
    }


}