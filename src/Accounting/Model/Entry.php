<?php

/*
 * This file is part of the BusinessComponents package.
 *
 */

namespace BusinessComponents\Accounting\Model;

use BusinessComponents\Traits\MutationTrait;
use BusinessComponents\Traits\StateTrait;
use DateTime;

class Entry implements EntryInterface
{

    use MutationTrait;
    use StateTrait;

    protected $key;
    protected $book;
    protected $effectDate;
    protected $description;

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

    public function setBook(Book $book)
    {
        $this->book = $book;
        return $this;
    }

    public function getBook()
    {
        return $this->book;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setEffectDate(DateTime $date)
    {
        $this->effectDate = $date;
        return $this;
    }

    public function getEffectDate()
    {
        return $this->effectDate;
    }
}
