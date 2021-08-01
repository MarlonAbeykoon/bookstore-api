<?php


namespace App\PricingContext\Discount;


use App\Entity\CartItem;

class ChildrenBookDiscount extends CategoricalDiscountStrategy
{
    protected int $bookThreshold = 5;

    protected float $discount = 0.1;

    protected string $categoryName = CartItem::CHILDREN;
}
