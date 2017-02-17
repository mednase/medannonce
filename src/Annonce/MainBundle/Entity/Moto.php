<?php
/**
 * Created by IntelliJ IDEA.
 * User: medna
 * Date: 09/04/2016
 * Time: 09:03
 */

namespace Annonce\MainBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Moto
 *
 * @ORM\Entity
 */

class Moto extends ObjetAnnonce
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
     * @ORM\Column(name="cylindre", type="string", length=255)
     */
    private $Cylindre;

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
    public function getCylindre()
    {
        return $this->Cylindre;
    }

    /**
     * @param string $Cylindre
     */
    public function setCylindre($Cylindre)
    {
        $this->Cylindre = $Cylindre;
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