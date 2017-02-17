<?php
/**
 * Created by IntelliJ IDEA.
 * User: medna
 * Date: 09/04/2016
 * Time: 08:29
 */

namespace Annonce\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**

 * Voiture
 *
 * @ORM\Entity
 */
class Voiture extends ObjetAnnonce
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
     * @var string
     *
     * @ORM\Column(name="energie", type="string", length=255)
     */
    private $Energie;

    /**
     * @var string
     *
     * @ORM\Column(name="boite_vitesse", type="string", length=255)
     */
    private $BoitueVitesse;


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

    /**
     * @return string
     */
    public function getEnergie()
    {
        return $this->Energie;
    }

    /**
     * @param string $Energie
     */
    public function setEnergie($Energie)
    {
        $this->Energie = $Energie;
    }

    /**
     * @return string
     */
    public function getBoitueVitesse()
    {
        return $this->BoitueVitesse;
    }

    /**
     * @param string $BoitueVitesse
     */
    public function setBoitueVitesse($BoitueVitesse)
    {
        $this->BoitueVitesse = $BoitueVitesse;
    }



}