<?php
// api/src/Entity/Author.php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\ArrayCollection;
use ApiPlatform\Core\Annotation\ApiProperty;
use Doctrine\ORM\Mapping as ORM;

/**
 * An Author.
 *
 * @ORM\Entity
 */
#[ApiResource(normalizationContext: ['groups' => ['book']])]
class Author
{
    /**
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private int $id;

    /**
     *
     * @ORM\Column(name="firstName", type="string", length=100)
     * @Groups("book")
     */
    private string $firstName;

    /**
     *
     * @ORM\Column(name="lastName", type="string", length=100)
     */
    private string $lastName;


    /**
     * Get id
     *
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set firstName
     *
     */
    public function setFirstName(string $firstName): Author
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     */
    public function setLastName(string $lastName): Author
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     */
    public function getFullName(): string
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function __toString()
    {
        return $this->getFullName();
    }
}