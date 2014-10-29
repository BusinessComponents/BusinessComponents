<?php

namespace BusinessComponents\Attribute\Model;

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

    public function hasAttribute($key)
    {
        return isset($this->attributes[$key]);
    }
    
    public function getAttributes()
    {
        return $this->attributes;
    }
}
