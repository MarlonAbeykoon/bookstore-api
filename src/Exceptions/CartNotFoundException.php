<?php


namespace App\Exceptions;


class CartNotFoundException extends \Exception
{
    public function __construct(int $customerId)
    {
        parent::__construct('No cart found for customer id '.$customerId, 1, null);
    }
}
