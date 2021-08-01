<?php


namespace App\PricingContext\Discount;


interface DiscountStrategyInterface
{
    public function getTotalAfterDiscount(float $total, array $CategoricalTotal): float;
    public function getCategoricalTotalAfterDiscount(array $CategoricalTotal): array;
    public function shouldDiscountBeUsed(array $numberOfBooksPerCategory): bool;
}
