<?php

/*
 * This file is part of the BusinessComponents package.
 *
 */

namespace BusinessComponents\Invoice\Model;

use BusinessComponents\Money\Money;
use BusinessComponents\Vat\Model\VatInterface;

class InvoiceLine implements InvoiceLineInterface
{

    protected $invoice;
    protected $key;
    protected $quantity = 1;
    protected $unitPrice = 0;
    protected $vat = null;

    public function __construct()
    {
        
    }

    public function setInvoice(InvoiceInterface $invoice)
    {
        $this->invoice = $invoice;
    }

    public function setKey($key)
    {
        $this->key = $key;
        return $this;
    }

    public function getKey()
    {
        return $this->key;
    }

    public function setUnitPrice($amount)
    {
        $this->unitPrice = (int)$amount;
        return $this;
    }
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    public function setVat(VatInterface $vat)
    {
        $this->vat = $vat;
        return $this;
    }

    public function setQuantity($quantity)
    {
        if (0 > $quantity) {
            throw new \OutOfRangeException('Quantity must be greater than 0.');
        }

        $this->quantity = $quantity;
        return $this;
    }
    public function getQuantity()
    {
        return $this->quantity;
    }

    public function getUnitPriceTotal()
    {
        $price = new Money($this->unitPrice);
        $price = $price->multiply($this->quantity);
        return $price->getAmount();
    }

    public function getTotalPrice()
    {
        $unitTotal = new Money($this->getUnitPriceTotal());
        $vatPrice = new Money(0);
        if ($this->vat !== null) {
            $vatPrice = $unitTotal->multiply($this->vat->getDecimalValue());
        }
        $total = $unitTotal->add($vatPrice);
        return $total->getAmount();
    }
}
