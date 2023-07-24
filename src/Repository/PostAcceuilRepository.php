<?php

namespace App\Repository;

use App\Entity\PostAcceuil;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PostAcceuil>
 *
 * @method PostAcceuil|null find($id, $lockMode = null, $lockVersion = null)
 * @method PostAcceuil|null findOneBy(array $criteria, array $orderBy = null)
 * @method PostAcceuil[]    findAll()
 * @method PostAcceuil[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostAcceuilRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PostAcceuil::class);
    }

//    /**
//     * @return PostAcceuil[] Returns an array of PostAcceuil objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PostAcceuil
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
