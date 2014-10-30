<?php

namespace BusinessComponents\Turnover\Model;

use BusinessComponents\Traits\MutationTrait;

class Group implements GroupInterface
{
    use MutationTrait;

    protected $segmentBy;
    protected $name;

    public function __construct()
    {
        $this->setCreatedAt();
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
}
