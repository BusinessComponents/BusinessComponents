<?php

namespace BusinessComponents\Discount\Model;

class Rule
{
    private $variable;
    
    public function setVariable($variable)
    {
        $this->variable = $variable;
    }

    public function getVariable()
    {
        return $this->variable;
    }
    
    private $comparison;

    public function setComparison($comparison)
    {
        $this->comparison = $comparison;
    }

    public function getComparison()
    {
        return $this->comparison;
    }
    
    private $value;
    
    public function setValue($value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }
    
    private $scope = 'line';

    public function setScope($scope)
    {
        switch($scope) {
            case 'line':
            case 'subject':
            case 'contact':
                break;
            default:
                throw new InvalidArgumentException("Unsupported scope");
        }
        $this->scope = $scope;
    }
    
    public function getScope()
    {
        return $this->scope;
    }
}
