<?php

namespace BusinessComponents\Turnover;

use BusinessComponents\Turnover\Model\Group;

class Resolver
{
    private $group;
    private $countryCode;
    private $vatRegion;
    private $handler;
    private $dayOfWeek;

    public function setCountryCode($code)
    {
        $this->countryCode = $code;
        return $this;
    }

    public function setVatRegion($region)
    {
        $this->vatRegion = $region;
        return $this;
    }

    public function setHandler($handler)
    {
        $this->handler = $handler;
        return $this;
    }

    public function setDayOfWeek($dow)
    {
        $this->dayOfWeek = $dow;
        return $this;
    }

    public function setGroup(Group $group)
    {
        $this->group = $group;
        return $this;
    }

    public function getAccount()
    {
        $value = $this->getSegmentValue();
        $fallbackAccount = '';
        $accounts = $this->group->getAccounts();
        foreach ($accounts as $account) {
            if ($account->getValue() == $value) {
                return $account;
                break;
            } elseif ($account->getValue() == '*') {
                $fallbackAccount = $account;
            }
        }
        if ($fallbackAccount) {
            return $fallbackAccount;
        }
        throw new \InvalidArgumentException(
            'Could not resolve turnover group account.'
        );
    }

    private function getSegmentValue()
    {
        $value = '';
        $segmentBy = $this->group->getSegmentBy();
        switch (strtoupper($segmentBy)) {
            case 'COUNTRYCODE':
                $value = $this->countryCode;
                break;
            case 'VATREGION':
                $value = $this->vatRegion;
                break;
            case 'HANDLER':
                $value = $this->handler;
                break;
            case 'DOTW':
                $value = $this->dayOfWeek;
                break;
            default:
                throw new \InvalidArgumentException('Segment is not configured.');
                break;
        }
        return $value;
    }
}
