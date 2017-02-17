<?php

namespace Annonce\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bureaux
 *
 * @ORM\Entity
 */
class Bureaux extends ObjetAnnonce
{


    /**
     * @var string
     *
     * @ORM\Column(name="surface", type="string", length=255)
     */
    private $surface;



    /**
     * Set surface
     *
     * @param string $surface
     *
     * @return Bureaux
     */
    public function setSurface($surface)
    {
        $this->surface = $surface;

        return $this;
    }

    /**
     * Get surface
     *
     * @return string
     */
    public function getSurface()
    {
        return $this->surface;
    }
}

