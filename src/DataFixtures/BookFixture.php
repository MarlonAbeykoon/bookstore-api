<?php

namespace App\DataFixtures;

use App\Entity\Author;
use App\Entity\Book;
use App\Entity\Category;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class BookFixture extends BaseFixture implements DependentFixtureInterface
{
    public function loadData(ObjectManager $manager)
    {
        $imageUrls[] = array("Mike", "Ondrej", "Honza", "Danca", "Misa", "Verca");

        $this->createMany(Book::class, 10, function(Book $book, $count, $imageUrls) {
            $index = array_rand($imageUrls,1);
            $book->setTitle($this->faker->sentence(2))
                ->setAuthor($this->getRandomReference(Author::class))
                ->setPrice($this->faker->randomFloat(2, 100, 2000))
                ->setDescription($this->faker->sentence)
                ->setImageUrl($imageUrls[$index])
                ->setCategory($this->getRandomReference(Category::class))
                ->setPublicationDate($this->faker->dateTimeBetween('-100 days', '-1 days'))
            ;

        });
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            AuthorFixture::class,
            CategoryFixture::class,
        ];
    }
}
