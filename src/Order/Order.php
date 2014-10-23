<?php

namespace BusinessComponents\Order;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use BusinessComponents\Order\OrderLineInterface;
use BusinessComponents\Attribute\AttributesTrait;

class Order implements OrderInterface
{

    use AttributesTrait;
    
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
}
