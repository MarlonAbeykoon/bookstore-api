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
    private ?\DateTimeInterface $shippedDate = null;

    /**
     * The order date of this order.
     *
     * @ORM\Column(type="datetime_immutable")
     */
    private ?\DateTimeInterface $orderDate = null;

    /**
     * The shipped via of this order.
     *
     * @ORM\Column(type="string")
     */
    private ?string $shippedVia = null;

    /**
     * One product has many features. This is the inverse side.
     * @ORM\OneToMany(targetEntity="OrderDetail", mappedBy="Order")
     */
    public OrderDetail $orderDetail;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getShippedDate(): \DateTimeInterface
    {
        return $this->shippedDate;
    }

    public function setShippedDate(\DateTimeInterface $shippedDate): self
    {
        $this->shippedDate = $shippedDate;

        return $this;
    }

    public function getorderDate(): \DateTimeInterface
    {
        return $this->shippedDate;
    }

    public function setorderDate(\DateTimeInterface $shippedDate): self
    {
        $this->shippedDate = $shippedDate;

        return $this;
    }

    public function getShippedVia(): ?string
    {
        return $this->shippedVia;
    }

    public function setShippedVia(?string $shippedVia): self
    {
        $this->shippedDate = $shippedVia;

        return $this;
    }
}
