<?php

/*
 * This file is part of the BusinessComponents package.
 *
 */

namespace BusinessComponents\Accounting\Model;

interface EntryInterface
{
    /**
     * Define the key of the journal entry
     * @param string $key
     */
    public function setKey($key);

    /**
     * Get the key of the journal entry
     * @return string
     */
    public function getKey();
}
