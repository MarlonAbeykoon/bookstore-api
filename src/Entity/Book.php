<?php
// api/src/Entity/Book.php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Controller\BookController;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\ArrayCollection;
use ApiPlatform\Core\Annotation\ApiProperty;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\BookRepository;

/**
* A book.
*
* @ORM\Entity(repositoryClass=BookRepository::class)
 */
#[ApiResource(normalizationContext: ['groups' => ['book', 'cart-book']])]

// collectionOperations: ['custom-action' => ['method'=> 'GET', 'deserialize'=>false,  'path'=>"/books/category", "controller"=>BookController::class]]
class Book
{
    /**
     * The id of this book.
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("book")
     *
     */
    private int $id;

    /**
     * The ISBN of this book (or null if doesn't have one).
     * @Groups("book")
     * @ORM\Column(nullable=true)
     */
    private ?string $isbn = null;

    /**
     * The title of this book.
     * @Groups({"book", "cart-book"})
     * @ORM\Column
     */
    private string $title;

    /**
     * The description of this book.
     * @Groups("book")
     * @ORM\Column(type="text")
     */
    private string $description = '';

    /**
     * The author of this book.
     *
     * @ORM\ManyToOne(targetEntity="Author", fetch="EAGER")
     * @ApiProperty(attributes={"fetchEager": true})
     * @Groups("book")
     */
    private Author $author;


    /**
     * The publication date of this book.
     * @Groups("book")
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private ?\DateTimeInterface $publicationDate = null;

    /**
     * @Groups("book")
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")  //category_id is this tables FK, id is category tables pk
     */
    private Category $category;

    /**
     * The price of the book
     * @Groups({"book", "cart-book"})
     * @ORM\Column(type="decimal", precision=7, scale=2)
     */
    private float $price;

    /**
     * The image of the book
     * @Groups("book")
     * @ORM\Column(type="string", nullable=true)
     */
    private ?string $imageUrl;


    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set title
     *
     */
    public function setTitle(string $title): Book
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set description
     *
     */
    public function setDescription(string $description): Book
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Set publication date
     *
     */
    public function setPublicationDate(\DateTimeInterface $publicationDate): Book
    {
        $this->publicationDate = $publicationDate;

        return $this;
    }

    /**
     * Get publication date
     *
     */
    public function getPublicationDate(): ?\DateTimeInterface
    {
        return $this->publicationDate;
    }


    /**
     * Set author
     *
     */
    public function setAuthor(Author $author = null): Book
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     */
    public function getAuthor(): Author
    {
        return $this->author;
    }

    /**
     * Get author
     *
     */
    public function getCategory(): Category
    {
        return $this->category;
    }

    /**
     * Set author
     *
     *
     */
    public function setCategory(Category $category = null): Book
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get price
     *
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * Set price
     *
     */
    public function setPrice(float $price): Book
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get imageUrl
     *
     */
    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    /**
     * Set imageUrl
     *
     */
    public function setImageUrl(?string $imageUrl): Book
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    public function __toString()
    {
        return $this->getTitle() . '(' . $this->getAuthor() . ')';
    }

}
