<?php

namespace BusinessComponents\Turnover\Model;

use BusinessComponents\Traits\MutationTrait;

class Account implements AccountInterface
{
    use MutationTrait;

    protected $value;
    protected $accountCode;
    protected $key;

    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setAccountCode($code)
    {
        $this->accountCode = $code;
        return $this;
    }

    public function getAccountCode()
    {
        return $this->accountCode;
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
}
