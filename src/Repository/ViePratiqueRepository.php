<?php

namespace App\Repository;

use App\Entity\ViePratique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ViePratique|null find($id, $lockMode = null, $lockVersion = null)
 * @method ViePratique|null findOneBy(array $criteria, array $orderBy = null)
 * @method ViePratique[]    findAll()
 * @method ViePratique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ViePratiqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ViePratique::class);
    }

    // /**
    //  * @return ViePratique[] Returns an array of ViePratique objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ViePratique
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
