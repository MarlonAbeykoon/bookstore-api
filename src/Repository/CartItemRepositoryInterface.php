<?php


namespace App\Repository;


interface CartItemRepositoryInterface
{
    public function getSumOfBooksGroupByCategoryForCustomer($customerId): array;
    public function getNumberOfBooksPerCategory($customerId): array;
    public function getCartTotal($customerId): float;
}
