<?php

namespace App\Repository;

use App\Entity\Movie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Movie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Movie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Movie[]    findAll()
 * @method Movie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MovieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Movie::class);
    }

    /**
    * @return Movie[] Returns an array of Movie objects
    */
    public function find10OrderByCreatedAtDesc()
    {
        return $this->createQueryBuilder('m')
            ->select("m.moviedb_id")
            ->orderBy('m.created_at', 'DESC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @return Movie[] Returns an array of Movie objects
     */
    public function find10OrderByTitle($page = 1)
    {
        return $this->createQueryBuilder('m')
            ->select("m")
            ->orderBy('m.title', 'ASC')
            ->setMaxResults(10)
            ->setFirstResult($page*10)
            ->getQuery()
            ->getResult()
            ;
    }

    /**
     * @return int
     */
    public function countAll()
    {
        return $this->createQueryBuilder('m')
            ->select("count(m.id)")
            ->getQuery()
            ->getOneOrNullResult()
            ;
    }


    /*
    public function findOneBySomeField($value): ?Movie
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
