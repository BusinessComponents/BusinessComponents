<?php

namespace BusinessComponents\Order\Loader;

use BusinessComponents\Order\Order;
use BusinessComponents\Order\OrderLine;

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
        foreach ($data['lines'] as $linedata) {
            $orderline = new OrderLine();
            $orderline->setQuantity($linedata['quantity']);
            $orderline->setUnitPrice($linedata['unitprice']);
            $orderline->setTitle($linedata['title']);
            $order->addLine($orderline);
        }
        return $order;
    }
}
