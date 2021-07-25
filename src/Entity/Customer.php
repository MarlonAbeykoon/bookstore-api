<?php
// api/src/Entity/Customer.php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\String_;

/**
 * A customer.
 *
 * @ORM\Entity
 */
#[ApiResource]
class Customer
{
    /**
     * The id of this customer.
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * The name of this customer (or null if doesn't have one).
     *
     * @ORM\Column(nullable=true)
     */
    private ?string $name = null;

    /**
     * The phone numebr of this phone (or null if doesn't have one).
     *
     * @ORM\Column(nullable=true)
     */
    private ?string $phone = null;

    /**
     * The address of this customer (or null if doesn't have one).
     *
     * @ORM\Column(nullable=true)
     */
    private ?string $address = null;

//    /**
//     * One Customer has One Cart.
//     * @OneToOne(targetEntity="Cart", mappedBy="customer")
//     */
//    private Cart $cart;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set name
     *
     */
    public function setName(string $name): Customer
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set name
     *
     */
    public function setPhone(string $phone): Customer
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get name
     *
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * Set name
     *
     */
    public function setAddress(string $address): Customer
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get name
     *
     */
    public function getAddress(): string
    {
        return $this->address;
    }
}