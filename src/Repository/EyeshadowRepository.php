<?php

namespace App\Repository;

use App\Entity\Eyeshadow;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Eyeshadow>
 *
 * @method Eyeshadow|null find($id, $lockMode = null, $lockVersion = null)
 * @method Eyeshadow|null findOneBy(array $criteria, array $orderBy = null)
 * @method Eyeshadow[]    findAll()
 * @method Eyeshadow[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EyeshadowRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Eyeshadow::class);
    }

    public function findOneRandom(): ?Eyeshadow
    {
        $count = $this->createQueryBuilder('e')
        ->select('count(e)')
        ->getQuery()
        ->getSingleScalarResult();
        return $this->createQueryBuilder('e')
        ->setMaxResults(1)
        ->setFirstResult(random_int(0, $count - 1))
        ->getQuery()
        ->getOneOrNullResult();
    }
//    /**
//     * @return Eyeshadow[] Returns an array of Eyeshadow objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Eyeshadow
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
