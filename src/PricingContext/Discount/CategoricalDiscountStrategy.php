<?php


namespace App\PricingContext\Discount;


use App\Entity\CartItem;

abstract class CategoricalDiscountStrategy implements DiscountStrategyInterface
{
    protected int $bookThreshold = 0;

    protected float $discount = 0;

    protected string $categoryName = '';

    public function getTotalAfterDiscount(float $total, array $CategoricalTotal): float
    {
        return array_sum(array_column($CategoricalTotal, 'total'));
    }

    public function getCategoricalTotalAfterDiscount(array $CategoricalTotal): array
    {
        foreach ($CategoricalTotal as &$category)
        {
            if(isset($category['categoryName']) && $category['categoryName'] === $this->categoryName)
            {
                $category['total'] = $category['total'] - ($category['total'] * $this->discount);
            }
        }
        return $CategoricalTotal;
    }

    public function shouldDiscountBeUsed(array $numberOfBooksPerCategory): bool
    {
        foreach ($numberOfBooksPerCategory as $category)
        {
            if(self::checkCriteria($category)){ return true;}
        }

        return false;
    }

    protected function checkCriteria(array $category): bool
    {
        if(isset($category['categoryName']) && $category['categoryName'] === CartItem::CHILDREN)
        {
            if($category['book_count'] >= $this->bookThreshold)
            {
                return true;
            }
        }
        return false;
    }
}
