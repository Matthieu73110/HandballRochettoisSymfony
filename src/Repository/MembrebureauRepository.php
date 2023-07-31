<?php

namespace App\Repository;

use App\Entity\Membrebureau;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Membrebureau>
 *
 * @method Membrebureau|null find($id, $lockMode = null, $lockVersion = null)
 * @method Membrebureau|null findOneBy(array $criteria, array $orderBy = null)
 * @method Membrebureau[]    findAll()
 * @method Membrebureau[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MembrebureauRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Membrebureau::class);
    }

//    /**
//     * @return Membrebureau[] Returns an array of Membrebureau objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Membrebureau
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
