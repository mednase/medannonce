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
 * Class Terrains
 * @ORM\Entity
 */
class Terrains extends ObjetAnnonce
{
    /**
     * @return string
     */
    public function getTypeTerrains()
    {
        return $this->TypeTerrains;
    }

    /**
     * @param string $TypeTerrains
     */
    public function setTypeTerrains($TypeTerrains)
    {
        $this->TypeTerrains = $TypeTerrains;
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
     * @var string
     *
     * @ORM\Column(name="type_terrains", type="string",length=255)
     */
    private $TypeTerrains;

    /**
     * @var integer
     *
     * @ORM\Column(name="surface", type="integer")
     */
    private $Surface;

}