<?php

namespace BusinessComponents\Discount\Model;

use BusinessComponents\Traits\NameTrait;
use BusinessComponents\Traits\DescriptionTrait;
use Doctrine\Common\Collections\ArrayCollection;
use DateTime;

class Discount
{
    use NameTrait;
    use DescriptionTrait;
    
    private $startAt;
    private $endAt;
    private $rules;
    private $quantitybreaks;

    public function __construct()
    {
        $this->rules = new ArrayCollection();
        $this->quantitybreaks = new ArrayCollection();
    }

    public function setStartAt(DateTime $date)
    {
        $this->startAt = $date;
    }

    public function getStartAt()
    {
        return $this->startAt;
    }

    public function setEndAt(DateTime $date)
    {
        $this->endAt = $date;
    }

    public function getEndAt()
    {
        return $this->endAt;
    }

    private $active = true;

    public function setActive($active)
    {
        $this->active = $active;
    }
    
    public function getActive()
    {
        return $this->active;
    }
    
    private $action = 'LINE-PERCENTAGE';

    public function setAction($action)
    {
        $this->action = $action;
    }
    
    public function getAction()
    {
        return $this->action;
    }

    public function addRule(Rule $rule)
    {
        $this->rules->add($rule);
    }
    
    public function removeRule(Rule $rule)
    {
        $this->rules->remove($rule);
    }
    
    public function getRules()
    {
        return $this->rules;
    }

    public function addQuantityBreak(QuantityBreak $quantitybreaks)
    {
        $this->quantitybreaks->add($quantitybreaks);
    }
    
    public function removeQuantityBreak(QuantityBreak $quantitybreaks)
    {
        $this->quantitybreaks->remove($quantitybreaks);
    }
    
    public function getQuantityBreaks()
    {
        return $this->quantitybreaks;
    }
}
