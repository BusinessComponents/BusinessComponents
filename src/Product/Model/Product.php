<?php

namespace BusinessComponents\Product\Model;

use Doctrine\Common\Collections\ArrayCollection;
use BusinessComponents\Attribute\Model\AttributesTrait;
use BusinessComponents\Traits\KeyTrait;

class Product implements ProductInterface
{

    use AttributesTrait;
    use KeyTrait;
    
    private $code;
    private $name;

    private $lines;
    
    private $state;

    public function __construct()
    {
        $this->lines = new ArrayCollection();
    }
    
    
    public function setCode($code)
    {
        $this->code = $code;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setState($state)
    {
        $this->state = $state;
    }
    
    public function getState()
    {
        return $this->state;
    }
}
