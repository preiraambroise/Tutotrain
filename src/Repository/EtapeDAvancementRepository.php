<?php

namespace App\Repository;

use App\Entity\EtapeDAvancement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method EtapeDAvancement|null find($id, $lockMode = null, $lockVersion = null)
 * @method EtapeDAvancement|null findOneBy(array $criteria, array $orderBy = null)
 * @method EtapeDAvancement[]    findAll()
 * @method EtapeDAvancement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EtapeDAvancementRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, EtapeDAvancement::class);
    }

//    /**
//     * @return EtapeDAvancement[] Returns an array of EtapeDAvancement objects
//     */

    /*
    public function findOneBySomeField($value): ?EtapeDAvancement
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
