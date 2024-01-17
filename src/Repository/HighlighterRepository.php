<?php

namespace App\Repository;

use App\Entity\Highlighter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Highlighter>
 *
 * @method Highlighter|null find($id, $lockMode = null, $lockVersion = null)
 * @method Highlighter|null findOneBy(array $criteria, array $orderBy = null)
 * @method Highlighter[]    findAll()
 * @method Highlighter[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HighlighterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Highlighter::class);
    }

//    /**
//     * @return Highlighter[] Returns an array of Highlighter objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('h.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Highlighter
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
