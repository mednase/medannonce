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

 * Appartement
 *
 * @ORM\Entity
 */

class Appartement extends ObjetAnnonce
{

    /**
     * @var integer
     *
     * @ORM\Column(name="chambre", type="integer")
     */
    private $Chambre;

    /**
     * @var integer
     *
     * @ORM\Column(name="surface", type="integer")
     */
    private $Surface;


    /**
     * @var boolean
     *
     * @ORM\Column(name="parcking", type="boolean")
     */
    private $Parking;

    /**
     * @return int
     */
    public function getChambre()
    {
        return $this->Chambre;
    }

    /**
     * @param int $Chambre
     */
    public function setChambre($Chambre)
    {
        $this->Chambre = $Chambre;
    }

    /**
     * @return int
     */
    public function getSurface()
    {
        return $this->Surface;
    }

    /**
     * @param int $Surface
     */
    public function setSurface($Surface)
    {
        $this->Surface = $Surface;
    }

    /**
     * @return boolean
     */
    public function isParking()
    {
        return $this->Parking;
    }

    /**
     * @param boolean $Parking
     */
    public function setParking($Parking)
    {
        $this->Parking = $Parking;
    }
}