<?php

namespace BusinessComponents\Order\Model;

use BusinessComponents\Attribute\Model\AttributesTrait;
use BusinessComponents\Adjustment\Model\AdjustmentsTrait;
use BusinessComponents\Vat\Model\VatInterface;
use BusinessComponents\Money\Money;

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
                    break;
                case 'LINE-FIXED':
                    $totalprice -= $param;
                    break;
            }
        }
        return $totalprice;
    }

    public function getUnitPriceTotal()
    {
        $price = new Money($this->unitprice);
        $price = $price->multiply($this->quantity);
        return $price->getAmount();
    }

    private $vat;

    public function setVat(VatInterface $vat)
    {
        $this->vat = $vat;
        return $this;
    }

    public function getVat()
    {
        return $this->vat;
    }

    public function getVatPrice()
    {
        $unitTotal = new Money($this->getUnitPriceTotal());
        $vatPrice  = new Money(0);
        if ($this->vat !== null) {
            $vatPrice = $unitTotal->multiply($this->vat->getDecimalValue());
        }
        return $vatPrice->getAmount();
    }
}
