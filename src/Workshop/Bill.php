<?php

namespace Workshop;

class Bill
{
    protected $expenses;

    public function __construct(Expenses $expenses) {
        $this->expenses = $expenses;
    }

    public function getBillForUser($user) {
        $expenses = $this->expenses->getExpensesOfUser($user);
        $priceWithTaxes = $expenses * 1.21;
        return $priceWithTaxes;
    }
}
