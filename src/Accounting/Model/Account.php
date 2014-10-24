<?php

/*
 * This file is part of the BusinessComponents package.
 *
 */

namespace BusinessComponents\Accounting\Model;

use BusinessComponents\Traits\MutationTrait;

class Account implements AccountInterface
{
    use MutationTrait;

    protected $key;
    protected $code;
    protected $administration;
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

    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setAdministration(Administration $administration)
    {
        $this->administration = $administration;
        return $this;
    }

    public function getAdministration()
    {
        return $this->administration;
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
