<?php

namespace App\Repository;

use App\Entity\SuiteUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method SuiteUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method SuiteUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method SuiteUser[]    findAll()
 * @method SuiteUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SuiteUserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SuiteUser::class);
    }

    // /**
    //  * @return SuiteUser[] Returns an array of SuiteUser objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SuiteUser
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
