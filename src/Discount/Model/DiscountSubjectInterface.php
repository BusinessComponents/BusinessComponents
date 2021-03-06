<?php

/*
 * This file is part of the BusinessComponents package.
 *
 */

namespace BusinessComponents\Discount\Model;

/**
 * DiscountSubjectInterface.
 *
 * @author Joost Faassen <j.faassen@linkorb.com>
 */
 
interface DiscountSubjectInterface
{
    public function getAttributes();
    public function getDiscountLines();
}
