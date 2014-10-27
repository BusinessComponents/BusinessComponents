<?php

namespace BusinessComponents\Order;

use Doctrine\Common\Collections\ArrayCollection;
use BusinessComponents\Order\OrderLineInterface;
use BusinessComponents\Attribute\AttributesTrait;
use BusinessComponents\Adjustment\AdjustmentsTrait;
use BusinessComponents\Discount\DiscountSubjectInterface;

class Order implements OrderInterface, DiscountSubjectInterface
{

    use AttributesTrait;
    use AdjustmentsTrait;
    
    private $ref;

    private $lines;
    
    private $state;

    public function __construct()
    {
        $this->lines = new ArrayCollection();
    }
    
    
    public function setRef($ref)
    {
        $this->ref = $ref;
    }

    public function getRef()
    {
        return $this->ref;
    }
    
    public function addLine(OrderLineInterface $orderline)
    {
        $this->lines->add($orderline);
    }
    
    public function getLines()
    {
        return $this->lines;
    }
    
    public function clearLines()
    {
        $this->lines->clear();
    }
    
    public function setState($state)
    {
        $this->state = $state;
    }
    
    public function getState()
    {
        return $this->state;
    }
    
    public function getTotalPrice()
    {
        $totalprice = 0;
        foreach ($this->lines as $line) {
            $totalprice += $line->getTotalPrice();
        }
        return $totalprice;
    }
    
    public function getDiscountLines()
    {
        return $this->getLines();
    }
}
