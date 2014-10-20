<?php

namespace BusinessComponents\Order;

use BusinessComponents\Order\OrderLineInterface;

class Order implements OrderInterface
{
    private $ref;
    
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
        $this->lines[] = $orderline;
    }
    
    public function getLines()
    {
        return $this->lines;
    }
}
