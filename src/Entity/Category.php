<?php
// api/src/Entity/Category.php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
* A category of a book.
*
* @ORM\Entity
*/
 #[ApiResource]
 class Category
 {
     /**
     * The id of this category.
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
     private ?int $id = null;


    /**
     * The category
     *
     * @ORM\Column(type="text")
     */
     private string $categoryName;


     public function getId(): ?int
    {
        return $this->id;
    }

     public function getCategoryName(): string
     {
         return $this->categoryName;
     }

     public function setCategoryName(string $categoryName): Category
     {
         $this->categoryName = $categoryName;

         return $this;
     }
}
