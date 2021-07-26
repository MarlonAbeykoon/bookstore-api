<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;

class CategoryFixture extends BaseFixture
{
    public function loadData(ObjectManager $manager)
    {
        $this->createMany(Category::class, 10, function(Category $category, $count) {
            $categories = ['Children', 'Fiction'];
            $category->setCategoryName($categories[$count]);
        });
        $manager->flush();
    }

}
