<?php

namespace App\Repository;

use App\Entity\Classeroom;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Classeroom|null find($id, $lockMode = null, $lockVersion = null)
 * @method Classeroom|null findOneBy(array $criteria, array $orderBy = null)
 * @method Classeroom[]    findAll()
 * @method Classeroom[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClasseroomRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Classeroom::class);
    }

    // /**
    //  * @return Classeroom[] Returns an array of Classeroom objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Classeroom
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
