<?php

namespace BusinessComponents\Adjustment;

class Adjustment
{
    private $action;
    
    public function setAction($action)
    {
        $this->action = $action;
    }
    
    public function getAction()
    {
        return $this->action;
    }
    
    private $actionparameter;
    
    public function setActionParameter($p)
    {
        $this->actionparameter = $p;
    }
    
    public function getActionParameter()
    {
        return $this->actionparameter;
    }
}