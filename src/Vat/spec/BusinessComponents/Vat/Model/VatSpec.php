<?php

namespace spec\BusinessComponents\Vat\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class VatSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('BusinessComponents\Vat\Model\Vat');
    }

    public function it_is_correct_when_calculting_decimal_value()
    {
        $this->setValue(21.6)->shouldReturn($this);
        $this->getDecimalValue()->shouldReturn(0.21);
    }
}
