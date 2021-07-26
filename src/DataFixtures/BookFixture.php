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

        $this->createMany(Book::class, 10, function(Book $book, $count) {
            $imageUrls = [
                "https://images-na.ssl-images-amazon.com/images/I/41S6-IA-Q8L._SX320_BO1,204,203,200_.jpg",
                "https://images-na.ssl-images-amazon.com/images/I/51oTL1GXEtL._SY291_BO1,204,203,200_QL40_FMwebp_.jpg",
                "https://images-na.ssl-images-amazon.com/images/I/3116UtjL6AS._SY291_BO1,204,203,200_QL40_FMwebp_.jpg",
                "https://images-na.ssl-images-amazon.com/images/I/41kspFBwVxL._SY291_BO1,204,203,200_QL40_FMwebp_.jpg"
            ];
            $index = array_rand($imageUrls,1);
            $book->setTitle($this->faker->sentence(2))
                ->setAuthor($this->getRandomReference(Author::class))
                ->setPrice($this->faker->randomFloat(2, 100, 2000))
                ->setDescription($this->faker->sentence)
                ->setImageUrl($imageUrls[$index])
                ->setCategory($this->getRandomReference(Category::class));

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
