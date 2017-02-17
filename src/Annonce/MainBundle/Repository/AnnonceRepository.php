<?php

namespace Annonce\MainBundle\Repository;

use Proxies\__CG__\Annonce\MainBundle\Entity\Categories;

/**
 * AnnonceRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AnnonceRepository extends \Doctrine\ORM\EntityRepository
{
    public function findByGouv($gouvernerat)
    {
        $query =$this->createQueryBuilder('u')->select('u')->where('u.gouvernorat = :gouvernerat')->orderBy('u.date_ajout')->setParameter('gouvernerat',$gouvernerat);
        return $query->getQuery()->getResult();
    }


    public function findByCategorie($categorie)
    {
        $query =$this->createQueryBuilder('u')->select('u')->where('u.categorie = :categorie')->setParameter('categorie',$categorie);
        return $query->getQuery()->getResult();
    }


}
