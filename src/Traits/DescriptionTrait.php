<?php

namespace BusinessComponents\Traits;

trait DescriptionTrait
{

    private $description;

    public function setDescription($description)
    {
        $this->description = $description;
    }
    
    public function getDescription()
    {
        return $this->description;
    }
}
