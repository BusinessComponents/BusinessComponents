<?php

namespace BusinessComponents\Invoice\Model;

use BusinessComponents\Vat\Model\VatInterface;

interface InvoiceLineInterface
{
    public function setInvoice(InvoiceInterface $invoice);

    /**
     * Define the unit price of an invoice line.
     * @param int $amount The minimal unit, e.g. cent.
     */
    public function setUnitPrice($amount);

    /**
     * Get the sum of unit price, excluding VAT.
     * @return int
     */
    public function getUnitPriceTotal();

    /**
     * Get the total price, including VAT.
     * @return int
     */
    public function getTotalPrice();

    /**
     * Define VAT object to the invoice line.
     * @param VatInterface
     */
    public function setVat(VatInterface $vat);

    /**
     * Define the quantity of items.
     * @param int $quantity
     */
    public function setQuantity($quantity);

    /**
     * Get item quantity.
     * @return int
     */
    public function getQuantity();
}
