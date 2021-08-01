<?php


namespace App\PricingContext\Discount;


use App\Entity\CartItem;

class FictionBookDiscount extends CategoricalDiscountStrategy
{
    protected int $bookThreshold = 5;

    protected float $discount = 0.1;

    protected string $categoryName = CartItem::FICTION;

    public function getTotalAfterDiscount(float $total, array $CategoricalTotal): float
    {
        // logic goes here
        return 0.0;
    }

    public function shouldDiscountBeUsed(array $numberOfBooksPerCategory): bool
    {
        // logic
        return false;
    }
}
