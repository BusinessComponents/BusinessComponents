<?php

namespace BusinessComponents\Discount;

use BusinessComponents\Adjustment\Model\Adjustment;
use BusinessComponents\Discount\Model\DiscountSubjectInterface;
use BusinessComponents\Discount\Model\Discount;
use Doctrine\Common\Collections\ArrayCollection;

class Discounter
{
    public function generateAdjustments(DiscountSubjectInterface $subject, Discount $discount)
    {
        $discountmatches = new ArrayCollection();
        $firstrule = true;
        foreach ($discount->getRules() as $rule) {
            $rulematches = new ArrayCollection();
            switch ($rule->getScope()) {
                case 'subject':
                    if ($this->matchRuleToScope($rule, $subject)) {
                        // if subject matches, add all lines
                        foreach ($subject->getDiscountLines() as $line) {
                            $rulematches->add($line);
                        }
                    }
                    break;
                case 'line':
                    foreach ($subject->getDiscountLines() as $line) {
                        if ($this->matchRuleToScope($rule, $line)) {
                            $rulematches->add($line);
                        }
                    }
                    break;
            }
            // Add all rulematches to the discountmatch
            $mergedmatches = new ArrayCollection();
            if ($firstrule) {
                // on the first rule, add all rulematches to the discountmatch
                foreach ($rulematches as $match) {
                    $mergedmatches->add($match);
                }
                $firstrule = false; // no longer the first rule
            } else {
                // on consecutive rules, check if the match is in both collections
                foreach ($rulematches as $match) {
                    // Support 'and' expressions only for now
                    if ($discountmatches->contains($match) && $rulematches->contains($match)) {
                        $mergedmatches->add($match);
                    }
                }
            }
            $discountmatches = $mergedmatches;
        }
        
        // $discountmatches now contains a list of lines that matched all rules
        $itemcount = 0;
        foreach ($discountmatches as $match) {
            $itemcount += $match->getQuantity();
        }
        
        //echo "ITEMCOUNT: " . $itemcount . "\n";
        //echo "LINECOUNT: " . count($discountmatches) . "\n";
        
        $quantitybreak = $this->getQuantityBreak($discount, $itemcount);
        /*
        if (!$quantitybreak) {
            echo "No quantity break found :(\n";
        }
        print_r($quantitybreak);
        */
        foreach ($discountmatches as $match) {
            $adjustment = new Adjustment();
            $adjustment->setAction($discount->getAction());
            $adjustment->setActionParameter($quantitybreak->getActionParameter());
            $adjustment->setComment("Discount: " . $discount->getName());
            $match->addAdjustment($adjustment);
        }
        
        //print_r($discountmatches);
        
    }
    
    /**
     * Return the highest quantitybreak for a given discount, based on itemcount
     */
    private function getQuantityBreak($discount, $quantity)
    {
        $res = null;
        foreach ($discount->getQuantityBreaks() as $quantitybreak) {
            if ($quantity >= $quantitybreak->getQuantity()) {
                if (($res == null) || ($res->getQuantity() < $quantitybreak->getQuantity())) {
                    $res = $quantitybreak;
                }
            }
        }
        return $res;
    }
    
    private function matchRuleToScope($rule, $scope)
    {
        if (!$scope->hasAttribute($rule->getVariable())) {
            return false;
        }
        
        $attribute = $scope->getAttribute($rule->getVariable());
        $value = $attribute->getValue();
        $rulevalue = $rule->getValue();
        //echo "VALUE: [$value][$rulevalue]\n";
        if ($rule->getComparison()=='equals') {
            if ($value == $rulevalue) {
                return true;
            }
        } else {
            if ($value != $rulevalue) {
                return true;
            }
        }
        return false;
    }
}
