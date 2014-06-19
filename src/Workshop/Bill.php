<?php

namespace Workshop;

class Bill
{
    protected $expenses;

    public function __construct(Expenses $expenses, $applyDiscounts = false)
    {
        $this->expenses = $expenses;
        $this->applyDiscounts = $applyDiscounts;
    }

    public function getBillForUser($user)
    {

    }
}
