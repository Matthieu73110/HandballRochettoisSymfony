<?php

namespace App\Repository;

use App\Entity\Eventclub;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Eventclub>
 *
 * @method Eventclub|null find($id, $lockMode = null, $lockVersion = null)
 * @method Eventclub|null findOneBy(array $criteria, array $orderBy = null)
 * @method Eventclub[]    findAll()
 * @method Eventclub[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventclubRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Eventclub::class);
    }

//    /**
//     * @return Eventclub[] Returns an array of Eventclub objects
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

//    public function findOneBySomeField($value): ?Eventclub
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
