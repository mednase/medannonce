<?php

namespace Annonce\MainBundle\Repository;

/**
 * MessageRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MessageRepository extends \Doctrine\ORM\EntityRepository
{
    public function getNewMessage($user)
    {
        $query=$this->createQueryBuilder('u')->select('u')
            ->where("u.vue = false")->andWhere('u.distinateur = :user')->addOrderBy("u.dateEnvoi")->setParameter('user',$user);

        return $query->getQuery()->getResult();
    }
}
