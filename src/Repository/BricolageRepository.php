<?php

namespace App\Repository;

use App\Entity\Bricolage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Bricolage|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bricolage|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bricolage[]    findAll()
 * @method Bricolage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BricolageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bricolage::class);
    }

    // /**
    //  * @return Bricolage[] Returns an array of Bricolage objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Bricolage
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
