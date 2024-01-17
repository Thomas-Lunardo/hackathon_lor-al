<?php

namespace App\Repository;

use App\Entity\Facepowder;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Facepowder>
 *
 * @method Facepowder|null find($id, $lockMode = null, $lockVersion = null)
 * @method Facepowder|null findOneBy(array $criteria, array $orderBy = null)
 * @method Facepowder[]    findAll()
 * @method Facepowder[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FacepowderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Facepowder::class);
    }

//    /**
//     * @return Facepowder[] Returns an array of Facepowder objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Facepowder
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
