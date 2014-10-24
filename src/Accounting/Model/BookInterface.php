<?php

/*
 * This file is part of the BusinessComponents package.
 *
 */

namespace BusinessComponents\Accounting\Model;

interface BookInterface
{
    /**
     * Define the key of the journal book
     * @param string $key
     */
    public function setKey($key);

    /**
     * Get the key of the journal book
     * @return string
     */
    public function getKey();
}
