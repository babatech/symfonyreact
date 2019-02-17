<?php

namespace App\Repository;

use App\Entity\Restaurant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Restaurant|null find($id, $lockMode = null, $lockVersion = null)
 * @method Restaurant|null findOneBy(array $criteria, array $orderBy = null)
 * @method Restaurant[]    findAll()
 * @method Restaurant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RestaurantRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Restaurant::class);
    }

    // /**
    //  * @return Restaurant[] Returns an array of Restaurant objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Restaurant
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    /**
     * @return Restaurant[] Returns an array of Restaurants objects
     */

    public function findByName($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.name LIKE :val')
            ->setParameter('val', '%'.$value.'%')
            ->orderBy('r.statusID', 'ASC')
            ->getQuery()
            ->getResult()
            ;
    }

    /**
     * @return Restaurant[] Returns an array of Restaurants objects
     */

    public function findAllRestaurants()
    {
        return $this->createQueryBuilder('r')
            ->orderBy('r.statusID', 'ASC')
            ->getQuery()
            ->getResult();
    }
    /**
     * @return Restaurant[] Returns an array of Restaurants objects
     */

    public function findTopMatch()
    {
        $entityManager = $this->getEntityManager();

        return $entityManager->createQuery(
            'SELECT r , ((r.distance * r.popularity) + r.ratingAverage) as topmatch
        FROM App\Entity\Restaurant r
        ORDER BY r.statusID ASC, topmatch ASC'
        )->getResult();
    }
    /**
     * @return Restaurant[] Returns an array of Restaurants objects
     */

    public function allSort($sort)
    {

        $query =  $this->createQueryBuilder('r')
            ->orderBy('r.statusID', 'ASC');
        switch ($sort){
            case 'TM':
                // top match
                $query = $query->select('r, ((r.distance * r.popularity) + r.ratingAverage) as topmatch')
                ->orderBy('topmatch', 'ASC');
                break;
            case 'BM':
                // best match
                $query = $query->orderBy('r.bestMatch', 'ASC');
                break;
            case 'NE':
                // newest
                $query = $query->orderBy('r.newest', 'ASC');
                break;
            case 'RA':
                // average rating
                $query = $query->orderBy('r.ratingAverage', 'DESC');
                break;
            case 'DI':
                // distance
                $query = $query->orderBy('r.distance', 'ASC');
                break;
            case 'PO':
                // popularity
                $query = $query->orderBy('r.popularity', 'DESC');
                break;
            case 'AP':
                // average price
                $query = $query->orderBy('r.averageProductPrice', 'ASC');
                break;
            case 'DC':
                // delivery cost
                $query = $query->orderBy('r.deliveryCosts', 'ASC');
                break;
            case 'MC':
                // min cost
                $query = $query->orderBy('r.minCost', 'ASC');
                break;
        }

        return $query->getQuery()->getResult();
    }
}