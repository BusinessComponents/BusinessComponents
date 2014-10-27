<?php

/*
 * This file is part of the BusinessComponents package.
 *
 */

namespace BusinessComponents\Accounting\Model;

class Record implements RecordInterface
{

    protected $key;

    public function setKey($key)
    {
        $this->key = $key;
        return $this;
    }

    public function getKey()
    {
        return $this->key;
    }
}
