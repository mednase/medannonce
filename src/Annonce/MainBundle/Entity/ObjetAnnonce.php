<?php
/**
 * Created by IntelliJ IDEA.
 * User: medna
 * Date: 09/04/2016
 * Time: 09:40
 */

namespace Annonce\MainBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\InheritanceType;
/**
 * SousCategories
 *
 * @ORM\Table(name="objet_annonce")
 * @InheritanceType("JOINED")
 * @ORM\Entity
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"voitrue" = "Voiture", "moto" = "Moto", "camion"="Camion" ,
 *     "appartement"="Appartement" , "bureaux"="Bureaux" ,"maison"="Maison" , "terrains"="Terrains"
 *     ,"telephone"="Telephone"})
 */


abstract class ObjetAnnonce
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
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

}