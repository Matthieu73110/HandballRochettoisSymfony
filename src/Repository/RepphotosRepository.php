<?php

namespace App\Repository;

use App\Entity\Repphotos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Repphotos>
 *
 * @method Repphotos|null find($id, $lockMode = null, $lockVersion = null)
 * @method Repphotos|null findOneBy(array $criteria, array $orderBy = null)
 * @method Repphotos[]    findAll()
 * @method Repphotos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RepphotosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Repphotos::class);
    }

//    /**
//     * @return Repphotos[] Returns an array of Repphotos objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Repphotos
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
