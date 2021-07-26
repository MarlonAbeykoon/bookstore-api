<?php

namespace App\DataFixtures;

use App\Entity\Cart;
use App\Entity\Customer;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CartFixture extends BaseFixture implements DependentFixtureInterface
{
    public function loadData(ObjectManager $manager)
    {
        $this->createMany(Cart::class, 1, function(Cart $cart, $count) {
            $cart->setCustomer($this->getRandomReference(Customer::class));
        });
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CustomerFixture::class,
        ];
    }

}
