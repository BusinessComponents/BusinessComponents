<?php

namespace BusinessComponents\Money;

use Money\Money as MathiasverraesMoney;
use Money\Currency;

class Money extends MathiasverraesMoney
{
    const DEFAULT_CURRENCY_NAME = 'EUR';

    /**
     * @param integer $amount
     */
    public function __construct($amount, Currency $currency = null)
    {
        if ($currency === null) {
            $currency = new Currency(self::DEFAULT_CURRENCY_NAME);
        }
        parent::__construct($amount, $currency);
    }
}
