<?php
// api/src/Entity/CartItem.php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiSubresource;

/**
 * A Cart Item.
 *
 * @ORM\Entity
 */
#[ApiResource(normalizationContext: ['groups' => ['cart-book']])]
class CartItem
{
    /**
     * The id of this cart item.
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /**
     * Many cart item has One book.
     * @ORM\ManyToOne (targetEntity="Book", fetch="EAGER")
     * @ORM\JoinColumn(name="book_id", referencedColumnName="id")
     * @ApiProperty(attributes={"fetchEager": true})
     * @Groups("cart-book")
     */
    private Book $book;

    /**
     * Many cart item has One book.
     * @ORM\ManyToOne (targetEntity="Cart")
     * @ORM\JoinColumn(name="cart_id", referencedColumnName="id")
     * @Groups("cart-book")
     */
    private Cart $cart;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set book
     *
     */
    public function setBook(Book $book): CartItem
    {
        $this->book = $book;

        return $this;
    }

    /**
     * Get book
     *
     */
    public function getBook(): Book
    {
        return $this->book;
    }

    /**
     * Set cart
     *
     */
    public function setCart(Cart $cart): CartItem
    {
        $this->cart = $cart;

        return $this;
    }

    /**
     * Get cart
     *
     */
    public function getCart(): Cart
    {
        return $this->cart;
    }
}