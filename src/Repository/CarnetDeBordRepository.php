<?php

namespace App\Repository;

use App\Entity\CarnetDeBord;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CarnetDeBord|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarnetDeBord|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarnetDeBord[]    findAll()
 * @method CarnetDeBord[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarnetDeBordRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CarnetDeBord::class);
    }

//    /**
//     * @return CarnetDeBord[] Returns an array of CarnetDeBord objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CarnetDeBord
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
