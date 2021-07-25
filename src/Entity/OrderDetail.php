<?php

// api/src/Entity/Order.php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * A Cart Item.
 *
 * @ORM\Entity
 */
#[ApiResource]
class OrderDetail
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
     * @ORM\ManyToOne (targetEntity="Order")
     * @ORM\JoinColumn(name="order_id", referencedColumnName="id")
     */
    public string $order;

    /**
     * Many cart item has One book.
     * @ORM\ManyToOne (targetEntity="Book")
     * @ORM\JoinColumn(name="book_id", referencedColumnName="id")
     */
    public string $book;

    /**
     * The quantity of this order item.
     *
     * @ORM\Column(type="integer")
     */
    public ?int $quantity = null;

    /**
     * The unit price of this order item.
     *
     * @ORM\Column(type="float")
     */
    public ?int $unitPrice = null;

    public function getId(): ?int
    {
        return $this->id;
    }
}