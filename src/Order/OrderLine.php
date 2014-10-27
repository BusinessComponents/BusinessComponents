<?php

namespace BusinessComponents\Order;

use BusinessComponents\Attribute\AttributesTrait;
use BusinessComponents\Adjustment\AdjustmentsTrait;

class OrderLine implements OrderLineInterface
{
    use AttributesTrait;
    use AdjustmentsTrait;
    
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
        $totalprice = $this->quantity * $this->unitprice;
        foreach ($this->getAdjustments() as $adjustment) {
            $param = $adjustment->getActionParameter();
            switch ($adjustment->getAction()) {
                case 'LINE-PERCENTAGE':
                    $totalprice -= ($totalprice /100 * $param);
            }
        }
        return $totalprice;
    }


}
