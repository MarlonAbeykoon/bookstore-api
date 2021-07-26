<?php

namespace App\DataFixtures;

use App\Entity\Author;
use Doctrine\Persistence\ObjectManager;

class AuthorFixture extends BaseFixture
{
    public function loadData(ObjectManager $manager)
    {
        $this->createMany(Author::class, 10, function(Author $author, $count) {

            $author->setFirstName($this->faker->firstName)
                ->setLastName($this->faker->lastName);

        });
        $manager->flush();
    }

}
