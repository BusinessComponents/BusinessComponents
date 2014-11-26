<?php

/*
 * This file is part of the BusinessComponents package.
 *
 */

namespace BusinessComponents\Vat\Model;

class Vat implements VatInterface
{
    protected $code;
    protected $description;
    protected $value = 0;
    protected $level;
    protected $country;

    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    public function getCode()
    {
        return $this->code;
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

    public function setLevel($level)
    {
        $this->level = $level;
        return $this;
    }

    public function getLevel()
    {
        return $this->level;
    }

    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setValue($value)
    {
        $value = (int)$value;
        if ($value < 0) {
            throw new \OutOfRangeException('VAT value must be 0 or greater');
        }
        $this->value = $value;
        return $this;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getDecimalValue()
    {
        return $this->value / 100;
    }
}
