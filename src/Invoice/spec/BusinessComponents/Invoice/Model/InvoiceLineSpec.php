<?php

namespace spec\BusinessComponents\Invoice\Model;

use PhpSpec\ObjectBehavior;
use BusinessComponents\Vat\Model\Vat;

class InvoiceLineSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('BusinessComponents\Invoice\Model\InvoiceLine');
    }

    public function it_is_correct_when_calculating_unit_total()
    {
        $this
            ->setQuantity(3)
            ->setUnitPrice(4323)
            ->shouldReturn($this)
        ;
        $this->getUnitPriceTotal()->shouldReturn(12969);
    }

    public function it_is_correct_when_calculating_total()
    {
        $vat = new Vat();
        $vat->setValue(21.5);

        $this
            ->setQuantity(3)
            ->setUnitPrice(4323)
            ->setVat($vat)
            ->shouldReturn($this)
        ;
        $this->getTotalPrice()->shouldReturn(15692);
    }
}
