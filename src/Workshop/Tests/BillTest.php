<?php

namespace Workshop\Tests;

use Workshop\Bill;
use Workshop\Ranking;

class BillTest extends \PHPUnit_Framework_TestCase
{
    public function testGetBillForUser()
    {
        $expensesData = array(50, 4);
        $expenses = \Mockery::mock('\Workshop\Expenses[getBoughtProducts]')->shouldAllowMockingProtectedMethods();
        $expenses->shouldReceive('getBoughtProducts')->andReturn($expensesData);
        $bill = new Bill($expenses);
        $this->assertEquals(242, $bill->getBillForUser('felix'));
    }

    public function testGetBillForUserWithDiscount()
    {
        $expensesData = array(50, 4);
        $expenses = \Mockery::mock('\Workshop\Expenses[getBoughtProducts]', array(10))->shouldAllowMockingProtectedMethods();
        $expenses->shouldReceive('getBoughtProducts')->andReturn($expensesData);
        $bill = new Bill($expenses, true);
        $this->assertEquals(217.8, $bill->getBillForUser('felix'));
    }
}
