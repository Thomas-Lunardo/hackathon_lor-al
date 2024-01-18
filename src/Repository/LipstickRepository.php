<?php

namespace App\Repository;

use App\Entity\Lipstick;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Lipstick>
 *
 * @method Lipstick|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lipstick|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lipstick[]    findAll()
 * @method Lipstick[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LipstickRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Lipstick::class);
    }
    public function findOneRandom(): ?Lipstick
    {
        $count = $this->createQueryBuilder('l')
        ->select('count(l)')
        ->getQuery()
        ->getSingleScalarResult();
        return $this->createQueryBuilder('l')
        ->setMaxResults(1)
        ->setFirstResult(random_int(0, $count - 1))
        ->getQuery()
        ->getOneOrNullResult();
    }
//    /**
//     * @return Lipstick[] Returns an array of Lipstick objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Lipstick
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
