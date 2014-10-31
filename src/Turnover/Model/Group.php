<?php

namespace BusinessComponents\Turnover\Model;

use BusinessComponents\Traits\MutationTrait;
use Doctrine\Common\Collections\ArrayCollection;

class Group implements GroupInterface
{
    use MutationTrait;

    protected $segmentBy;
    protected $name;
    protected $accounts;

    public function __construct()
    {
        $this->setCreatedAt();
        $this->accounts = new ArrayCollection();
    }

    public function setSegmentBy($segmentBy)
    {
        $this->segmentBy = $segmentBy;
        return $this;
    }

    public function getSegmentBy()
    {
        return $this->segmentBy;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function addAccount(Account $account)
    {
        $this->accounts->add($account);
    }

    public function getAccounts()
    {
        return $this->accounts->toArray();
    }
}
