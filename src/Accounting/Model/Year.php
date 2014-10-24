<?php

/*
 * This file is part of the BusinessComponents package.
 *
 */

namespace BusinessComponents\Accounting\Model;

use BusinessComponents\Traits\MutationTrait;
use DateTime;

class Year implements YearInterface
{
    use MutationTrait;

    protected $key;
    protected $description;
    protected $start;
    protected $end;

    public function __construct()
    {
        $this->setCreatedAt();
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

    public function setStart(DateTime $start)
    {
        $this->start = $start;
        return $this;
    }

    public function getStart()
    {
        return $this->start;
    }

    public function setEnd(DateTime $end)
    {
        $this->end = $end;
        return $this;
    }

    public function getEnd()
    {
        return $this->end;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function isCurrent()
    {
        $now = new DateTime();
        return $now >= $this->start && $now < $this->end;
    }
}
