<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\InvoiceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InvoiceRepository::class)
 */
#[ApiResource]
class InvoiceDetail
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * Many invoice item has One Invoice.
     * @ORM\ManyToOne (targetEntity="Invoice")
     * @ORM\JoinColumn(name="invoice_id", referencedColumnName="id")
     */
    private Invoice $invoice;

    /**
     * Many invoice item has One Invoice.
     * @ORM\OneToOne (targetEntity="OrderDetail")
     * @ORM\JoinColumn(name="order_detail_id", referencedColumnName="id")
     */
    private OrderDetail $orderDetail;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInvoice(): Invoice
    {
        return $this->invoice;
    }

    public function setInvoice(Invoice $invoice): self
    {
        $this->invoice = $invoice;

        return $this;
    }

    public function getOrderDetail(): OrderDetail
    {
        return $this->orderDetail;
    }

    public function setOrderDetail(OrderDetail $orderDetail): self
    {
        $this->orderDetail = $orderDetail;

        return $this;
    }
}
