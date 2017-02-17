<?php
/**
 * Created by IntelliJ IDEA.
 * User: medna
 * Date: 10/04/2016
 * Time: 01:58
 */

namespace Annonce\MainBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Class Telephone
 * @ORM\Entity
 */

class Telephone extends ObjetAnnonce
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
}