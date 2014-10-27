<?php

namespace BusinessComponents\Discount;

class QuantityBreak
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
    
    private $actionparameter;
    
    public function setActionParameter($actionparameter)
    {
        $this->actionparameter = $actionparameter;
    }
    
    public function getActionParameter()
    {
        return $this->actionparameter;
    }
}
