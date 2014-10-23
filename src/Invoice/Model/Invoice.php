<?php

/*
 * This file is part of the BusinessComponents package.
 *
 */

namespace BusinessComponents\Invoice\Model;

use Doctrine\Common\Collections\ArrayCollection;

class Invoice implements InvoiceInterface
{

    protected $ref;
    protected $key;
    protected $lines;

    public function __construct()
    {
        $this->lines = new ArrayCollection();
    }

    public function setRef($ref)
    {
        $this->ref = $ref;
        return $this;
    }

    public function getRef()
    {
        return $this->ref;
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

    public function addLine(InvoiceLineInterface $invoiceline)
    {
        $this->lines->add($invoiceline);
    }
}
