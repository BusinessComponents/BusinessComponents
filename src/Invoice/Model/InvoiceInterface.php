<?php

/*
 * This file is part of the BusinessComponents package.
 *
 */

namespace BusinessComponents\Invoice\Model;

/**
 * Invoice interface.
 *
 * @author Hongliang Wang <h.wang@linkorb.com>
 */
interface InvoiceInterface
{
    /**
     * Add invoice line to the invoice.
     * @param InvoiceLineInterface $invoiceline
     * @return void
     */
    public function addLine(InvoiceLineInterface $invoiceline);
}
