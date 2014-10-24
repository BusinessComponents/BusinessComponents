<?php

namespace BusinessComponents\Traits;

trait StateTrait
{

    private $state;

    public function setState($state)
    {
        $this->state = $state;
    }
    
    public function getState()
    {
        return $this->state;
    }
}
