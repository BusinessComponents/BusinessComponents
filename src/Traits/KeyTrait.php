<?php

namespace BusinessComponents\Traits;

trait KeyTrait
{

    private $key;

    public function setKey($key)
    {
        $this->key = $key;
    }
    
    public function getKey()
    {
        return $this->key;
    }
}
