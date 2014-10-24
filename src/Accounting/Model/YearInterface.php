<?php

/*
 * This file is part of the BusinessComponents package.
 *
 */

namespace BusinessComponents\Accounting\Model;

use DateTime;

interface YearInterface
{
    /**
     * Define the start of the accounting year
     * @param DateTime
     */
    public function setStart(DateTime $start);

    /**
     * Get the start of the accounting year
     * @return DateTime
     */
    public function getStart();

    /**
     * Define the end of the accounting year
     * @return DateTime
     */
    public function setEnd(DateTime $end);

    /**
     * Get the end of the accounting year
     * @return DateTime
     */
    public function getEnd();
}
