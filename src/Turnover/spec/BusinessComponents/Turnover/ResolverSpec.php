<?php

namespace spec\BusinessComponents\Turnover;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use BusinessComponents\Turnover\Model\Account;
use BusinessComponents\Turnover\Model\Group;

class ResolverSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('BusinessComponents\Turnover\Resolver');
    }

    public function it_is_correct_get_account()
    {
        $account1 =  new Account();
        $account1->setValue('NLD');
        $account1->setAccountCode(8000);

        $account2 =  new Account();
        $account2->setValue('EU');
        $account2->setAccountCode(8001);
        
        $group = new Group();
        $group->addAccount($account1);
        $group->addAccount($account2);
        $group->setSegmentBy('VATREGION');

        $this->setGroup($group);
        $this->setVatRegion('EU');
        $this->getAccount()->shouldReturn($account2);
    }
}
