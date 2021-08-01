<?php

namespace App\Repository;

use App\Entity\CartItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CartItem|null find($id, $lockMode = null, $lockVersion = null)
 * @method CartItem|null findOneBy(array $criteria, array $orderBy = null)
 * @method CartItem[]    findAll()
 * @method CartItem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CartItemRepository extends ServiceEntityRepository implements CartItemRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CartItem::class);
    }

    /**
      * Returns an array of sums of books
      */

    public function getSumOfBooksGroupByCategoryForCustomer($customerId): array
    {
        return $this->createQueryBuilder('ci')
            ->select('ca.id', 'ca.categoryName', 'SUM(b.price) AS total')
            ->innerJoin('ci.cart', 'c')
            ->andWhere('c.customer = :customerId')
            ->setParameter('customerId', $customerId)
            ->innerJoin('ci.book', 'b')
            ->innerJoin('b.category', 'ca')
            ->groupBy('b.category')
            ->getQuery()
            ->getResult()
        ;
    }

    public function getNumberOfBooksPerCategory($customerId): array
    {
        return $this->createQueryBuilder('ci')
            ->select('ca.id', 'ca.categoryName', 'COUNT(b.id) AS book_count')
            ->innerJoin('ci.cart', 'c')
            ->andWhere('c.customer = :customerId')
            ->setParameter('customerId', $customerId)
            ->innerJoin('ci.book', 'b')
            ->innerJoin('b.category', 'ca')
            ->groupBy('b.category')
            ->getQuery()
            ->getResult()
            ;
    }

    public function getCartTotal($customerId): float
    {
        return (float)$this->createQueryBuilder('ci')
            ->select('SUM(b.price) AS total')
            ->innerJoin('ci.cart', 'c')
            ->andWhere('c.customer = :customerId')
            ->setParameter('customerId', $customerId)
            ->innerJoin('ci.book', 'b')
            ->getQuery()
            ->getResult()[0]['total']
            ;
    }
}
