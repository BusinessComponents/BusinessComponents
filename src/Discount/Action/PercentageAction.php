<?php

namespace BusinessComponents\Discount\Action;

use BusinessComponents\Traits\NameTrait;
use BusinessComponents\Traits\DescriptionTrait;
use Doctrine\Common\Collections\ArrayCollection;

class PercentageAction
{
    private $parameter = 0;
    public function setParameter($parameter)
    {
        $this->parameter = $parameter;
    }

    public function getParameter()
    {
        return $this->parameter;
    }
    
    public function applyLine(OrderLineInterface $line)
    {
        $totalprice = $line->getTotalPrice();
        $adjustmentprice = ($totalprice /100 * $this->parameter);
        $line->addAdjustmentPrice(-$adjustmentprice)
    }
}
