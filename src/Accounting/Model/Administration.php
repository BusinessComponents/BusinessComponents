<?php

/*
 * This file is part of the BusinessComponents package.
 *
 */

namespace BusinessComponents\Accounting\Model;

use BusinessComponents\Traits\MutationTrait;

class Administration implements AdministrationInterface
{
    use MutationTrait;

    protected $key;
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

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }
}
