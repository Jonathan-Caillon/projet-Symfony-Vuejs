<?php

namespace App\Repository;

use App\Entity\Gros;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Gros|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gros|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gros[]    findAll()
 * @method Gros[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GrosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Gros::class);
    }

    // /**
    //  * @return Gros[] Returns an array of Gros objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Gros
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
