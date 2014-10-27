<?php

/*
 * This file is part of the BusinessComponents package.
 *
 */

namespace BusinessComponents\Accounting\Model;

interface AccountInterface
{
    /**
     * Define the code of the account
     * @param string $code
     * @return Account
     */
    public function setCode($code);

    /**
     * Get the code of the account
     * @return string
     */
    public function getCode();
}
