<?php


namespace App\PricingContext\Discount;


abstract class TotalBillDiscountStrategy implements DiscountStrategyInterface
{
    protected int $bookThreshold = 0;

    protected float $discount = 0;

    public function getTotalAfterDiscount(float $total, array $CategoricalTotal): float
    {
        return $total - ($total * $this->discount);
    }

    public function getCategoricalTotalAfterDiscount(array $CategoricalTotal): array
    {
        return $CategoricalTotal;
    }

    protected function checkCriteria(array $category): bool
    {
        if(isset($category['categoryName']))
        {
            if($category['book_count'] >= $this->bookThreshold)
            {
                return true;
            }
        }
        return false;
    }
}
