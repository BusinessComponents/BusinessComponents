<?php

namespace BusinessComponents\Attribute\Model;

class Attribute
{

    private $key;

    private $value;
    
    public function __construct()
    {
    
    }
    
    public function setKey($key)
    {
        $this->key = $key;
    }

    public function getKey()
    {
        return $this->key;
    }
    
    public function setValue($value)
    {
        $this->value = $value;
    }
    
    public function getValue()
    {
        return $this->value;
    }
}
