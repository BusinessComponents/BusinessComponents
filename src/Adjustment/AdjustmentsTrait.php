<?php

namespace BusinessComponents\Adjustment;

trait AdjustmentsTrait
{

    private $adjustments = array();

    public function addAdjustment(Adjustment $adjustment)
    {
        $this->adjustments[] = $adjustment;
    }

    public function getAdjustments()
    {
        return $this->adjustments;
    }
    
    public function clearAdjustments()
    {
        $this->adjustments = array();
    }
}
