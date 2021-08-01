<?php


namespace App\PricingContext;

use App\Exceptions\CartNotFoundException;
use App\PricingContext\Discount\DiscountStrategyInterface;
use App\Repository\CartItemRepositoryInterface;

class PricingContext
{
    private array $discountStrategies;

    public function __construct()
    {
        $this->discountStrategies = [];
    }

    /**
     * @throws CartNotFoundException
     */
    public function calculateTotal(int $customerId, ?string $coupon, CartItemRepositoryInterface $repository): array
    {
        $categoricalTotal = $repository->getSumOfBooksGroupByCategoryForCustomer($customerId);
        $total = $repository->getCartTotal($customerId);
        $numberOfBooksPerCategory = $repository->getNumberOfBooksPerCategory($customerId);

        if(!$categoricalTotal)
        {
            throw new CartNotFoundException($customerId);
        }

        if($this->isCouponValid($coupon)) // May be we can add coupon also as a strategy
        {
            return ['total'=>$total - ($total * $this->getCouponValue()), 'categoricalTotal' => $categoricalTotal];
        }

        foreach ($this->discountStrategies as $discount) {
            if($discount->shouldDiscountBeUsed($numberOfBooksPerCategory, $categoricalTotal))
            {
                $categoricalTotal = $discount->getCategoricalTotalAfterDiscount($categoricalTotal);
                $total = $discount->getTotalAfterDiscount($total, $categoricalTotal);
            }
        }

        return ['total'=>$total, 'categoricalTotal' => $categoricalTotal];
    }

    public function addStrategy(string $strategyName, DiscountStrategyInterface $strategy): void
    {
        $this->discountStrategies[$strategyName] = $strategy;
    }

    private function isCouponValid(?string $coupon): bool
    {
        if($coupon) {
            // #todo validate from DB too
            return true;
        }

        return false;
    }

    private function getCouponValue(): float
    {
        return 0.15;
    }



}
