<?php

namespace BusinessComponents\Invoice\Model;

use BusinessComponents\Vat\Model\VatInterface;

interface InvoiceLineInterface
{
    /**
     * @return void
     */
    public function setInvoice(InvoiceInterface $invoice);

    /**
     * Define the unit price of an invoice line.
     * @param int $amount The minimal unit, e.g. cent.
     * @return InvoiceLine
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
     * @return InvoiceLine
     */
    public function setVat(VatInterface $vat);

    /**
     * Define the quantity of items.
     * @param int $quantity
     * @return InvoiceLine
     */
    public function setQuantity($quantity);

    /**
     * Get item quantity.
     * @return int
     */
    public function getQuantity();
}
