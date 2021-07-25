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
class Order
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
     * The shipped date of this order.
     *
     * @ORM\Column(type="datetime_immutable")
     */
    public ?\DateTimeInterface $shippedDate = null;

    /**
     * The order date of this order.
     *
     * @ORM\Column(type="datetime_immutable")
     */
    public ?\DateTimeInterface $orderDate = null;

    /**
     * The shipped via of this order.
     *
     * @ORM\Column(type="string")
     */
    public ?string $shippedVia = null;

    /**
     * One product has many features. This is the inverse side.
     * @ORM\OneToMany(targetEntity="OrderDetail", mappedBy="Order")
     */
    private OrderDetail $orderDetail;


    public function getId(): ?int
    {
        return $this->id;
    }
}