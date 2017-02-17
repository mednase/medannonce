<?php
/**
 * Created by IntelliJ IDEA.
 * User: medna
 * Date: 10/04/2016
 * Time: 01:59
 */

namespace Annonce\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Class Maison
 * @ORM\Entity
 */
class Maison extends ObjetAnnonce
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
     * @var integer
     * @ORM\Column(name="etage",type="integer")
     */
    private $etage;

    /**
     * @var integer
     * @ORM\Column(name="garage" , type="integer")
     */
    private $garage;

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
     * @return int
     */
    public function getEtage()
    {
        return $this->etage;
    }

    /**
     * @param int $etage
     */
    public function setEtage($etage)
    {
        $this->etage = $etage;
    }

    /**
     * @return int
     */
    public function getGarage()
    {
        return $this->garage;
    }

    /**
     * @param int $garage
     */
    public function setGarage($garage)
    {
        $this->garage = $garage;
    }


}