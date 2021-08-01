<?php


namespace App\PricingContext\Discount;


class TotalBillAllCategoryDiscount extends TotalBillDiscountStrategy
{
    protected int $bookThreshold = 10;

    protected float $discount = 0.05;

    public function shouldDiscountBeUsed(array $numberOfBooksPerCategory): bool
    {
        foreach ($numberOfBooksPerCategory as $category)
        {
            if(!$this->checkCriteria($category)){ return false;}
        }
        return true;
    }
}
