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
        if ($this->applyDiscounts) {
            $expenses = $this->expenses->getExpensesOfUserWithDiscount($user);
        } else {
            $expenses = $this->expenses->getExpensesOfUser($user);
        }
        $priceWithTaxes = $expenses * 1.21;
        return $priceWithTaxes;
    }
}
