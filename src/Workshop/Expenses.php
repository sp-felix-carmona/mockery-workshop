<?php

namespace Workshop;

class Expenses
{
    public function __construct($discount = 10) {
        $this->discount = $discount;
    }

    public function getExpensesOfUserWithDiscount($user) {
        $expenses = $this->getExpensesOfUser($user);
        if ($this->discount > 0) {
            return $expenses - ($expenses * ($this->discount / 100));
        }
        return $expenses;
    }

    public function getExpensesOfUser($user) {
        list($amount, $price) = $this->getBoughtProducts($user);
        return $this->calculateTotalExpenses($amount, $price);
    }

    protected function calculateTotalExpenses($amount, $price) {
        return $amount * $price;
    }

    protected function getBoughtProducts($user) {
        die('this is an api request, and you can not perform it in a test.');
    }
}
