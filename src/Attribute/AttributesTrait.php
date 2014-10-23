<?php

namespace BusinessComponents\Attribute;

trait AttributesTrait
{

    private $attributes = array();

    
    public function addAttribute(Attribute $attribute)
    {
        $this->attributes[$attribute->getKey()] = $attribute;
    }

    public function getAttribute($key)
    {
        return $this->attributes[$key];
    }
    
    public function getAttributes()
    {
        return $this->attributes;
    }
}
