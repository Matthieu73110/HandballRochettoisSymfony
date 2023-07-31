<?php

namespace App\Repository;

use App\Entity\Informationequipe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Informationequipe>
 *
 * @method Informationequipe|null find($id, $lockMode = null, $lockVersion = null)
 * @method Informationequipe|null findOneBy(array $criteria, array $orderBy = null)
 * @method Informationequipe[]    findAll()
 * @method Informationequipe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InformationequipeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Informationequipe::class);
    }

//    /**
//     * @return Informationequipe[] Returns an array of Informationequipe objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Informationequipe
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
