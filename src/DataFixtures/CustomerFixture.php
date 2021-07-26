<?php

namespace App\DataFixtures;

use App\Entity\Customer;
use Doctrine\Persistence\ObjectManager;

class CustomerFixture extends BaseFixture
{
    public function loadData(ObjectManager $manager)
    {
        $this->createMany(Customer::class, 1, function(Customer $customer, $count) {
            $customer->setAddress($this->faker->address)
                ->setName($this->faker->name)
                ->setPhone($this->faker->phoneNumber);
        });
        $manager->flush();
    }

}
