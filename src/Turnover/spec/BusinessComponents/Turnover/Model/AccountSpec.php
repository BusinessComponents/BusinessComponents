<?php

namespace spec\BusinessComponents\Turnover\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AccountSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('BusinessComponents\Turnover\Model\Account');
    }

    public function it_is_correct_set_value()
    {
        $this->setValue('value1')->shouldReturn($this);
        $this->getValue()->shouldReturn('value1');
    }

    public function it_is_correct_set_account_code()
    {
        $this->setAccountCode('code1')->shouldReturn($this);
        $this->getAccountCode()->shouldReturn('code1');
    }
}
