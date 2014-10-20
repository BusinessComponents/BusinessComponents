<?php

namespace BusinessComponents\Order;

class OrderLine implements OrderLineInterface
{
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


}
