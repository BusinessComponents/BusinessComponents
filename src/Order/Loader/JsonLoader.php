<?php

namespace BusinessComponents\Order\Loader;

use BusinessComponents\Order\Order;
use BusinessComponents\Order\OrderLine;
use BusinessComponents\Attribute\Attribute;
use BusinessComponents\Vat\Vat;

class JsonLoader
{
    private $filename;
    
    public function __construct($filename)
    {
        $this->filename = $filename;
    }
    
    public function load()
    {
        $order = new Order();
        $json = file_get_contents($this->filename);
        $data = json_decode($json, true);
        
        $order->setRef($data['ref']);
        $order->setState($data['state']);
        
        foreach ($data['attributes'] as $attributedata) {
            $attribute = new Attribute();
            $attribute->setKey($attributedata['key']);
            $attribute->setValue($attributedata['value']);
            $order->addAttribute($attribute);
        }

        foreach ($data['lines'] as $linedata) {
            $orderline = new OrderLine();
            $orderline->setQuantity($linedata['quantity']);
            $orderline->setUnitPrice($linedata['unitprice']);
            $orderline->setTitle($linedata['title']);
            $vat = new Vat();
            $vat->setValue($linedata['vatvalue']);
            $orderline->setVat($vat);

            foreach ($linedata['attributes'] as $attributedata) {
                $attribute = new Attribute();
                $attribute->setKey($attributedata['key']);
                $attribute->setValue($attributedata['value']);
                $orderline->addAttribute($attribute);
            }
            
            $order->addLine($orderline);



        }
        return $order;
    }
}
