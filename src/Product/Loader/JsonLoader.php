<?php

namespace BusinessComponents\Product\Loader;

use BusinessComponents\Product\Model\Product;
use BusinessComponents\Attribute\Model\Attribute;

class JsonLoader
{
    private $filename;
    
    public function __construct($filename)
    {
        $this->filename = $filename;
    }
    
    public function load()
    {
        $product = new Product();
        $json = file_get_contents($this->filename);
        $data = json_decode($json, true);
        
        $product->setCode($data['code']);
        $product->setName($data['name']);
        $product->setState($data['state']);
        
        foreach ($data['attributes'] as $attributedata) {
            $attribute = new Attribute();
            $attribute->setKey($attributedata['key']);
            $attribute->setValue($attributedata['value']);
            $product->addAttribute($attribute);
        }
        
        return $product;
    }
}
