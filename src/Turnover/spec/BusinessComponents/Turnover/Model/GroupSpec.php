<?php

namespace spec\BusinessComponents\Turnover\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GroupSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('BusinessComponents\Turnover\Model\Group');
    }

    public function it_is_correct_to_set_segmentby()
    {
        $this->setSegmentBy('aaa')->shouldReturn($this);
        $this->getSegmentBy()->shouldReturn('aaa');
    }

    public function it_is_correct_to_set_name()
    {
        $this->setName('test group')->shouldReturn($this);
        $this->getName()->shouldReturn('test group');
    }
}
