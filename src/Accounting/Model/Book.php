<?php

/*
 * This file is part of the BusinessComponents package.
 *
 */

namespace BusinessComponents\Accounting\Model;

use BusinessComponents\Traits\MutationTrait;

class Book implements BookInterface
{

    protected $key;
    protected $code;
    protected $description;
    protected $account;
    protected $administration;
    protected $type;

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

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    public function getType()
    {
        return $this->type;
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

    public function setAdministration(Administration $administration)
    {
        $this->administration = $administration;
        return $this;
    }

    public function getAdministration()
    {
        return $this->administration;
    }

    public function setAccount(Account $account)
    {
        if (!$account->getAdministration() != $this->administration) {
            throw new \InvalidArgumentException('The account does not belone to the same administration.');
        }
        $this->account = $account;
        return $this;
    }

    public function getAccount()
    {
        return $this->account;
    }
}
