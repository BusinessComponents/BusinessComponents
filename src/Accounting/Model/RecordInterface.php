<?php

/*
 * This file is part of the BusinessComponents package.
 *
 */

namespace BusinessComponents\Accounting\Model;

interface RecordInterface
{
    /**
     * Define the key of the journal record
     * @param string $key
     * @return Record
     */
    public function setKey($key);

    /**
     * Get the key of the journal record
     * @return string
     */
    public function getKey();
}
