<?php

namespace BusinessComponents\Order;

use BusinessComponents\Attribute\AttributesTrait;

class OrderLine implements OrderLineInterface
{
    use AttributesTrait;
    
    private $quantity;
    
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }
    
    private $unitprice;
    
    public function setUnitPrice($unitprice)
    {
        $this->unitprice = $unitprice;
    }

    public function getUnitPrice()
    {
        return $this->unitprice;
    }

    private $title;
    
    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }
    
    public function getTotalPrice()
    {
        return $this->quantity * $this->unitprice;
    }


}
