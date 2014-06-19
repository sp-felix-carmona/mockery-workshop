<?php

namespace Workshop\Tests;

use Workshop\Bill;
use Workshop\Ranking;

class BillTest extends \PHPUnit_Framework_TestCase
{
    public function testGetBillForUser()
    {
        $expensesData = array(50, 4);

        // Traditional Partial Mock
        $expenses = \Mockery::mock('\Workshop\Expenses[getBoughtProducts,logDiscount]')->shouldAllowMockingProtectedMethods();
        
        $expenses->shouldReceive('getBoughtProducts')->andReturn($expensesData);
        $expenses->shouldReceive('logDiscount')->andReturnUndefined();
        $bill = new Bill($expenses);
        $this->assertEquals(242, $bill->getBillForUser('felix'));
    }

    public function testGetBillForUserWithDiscount()
    {
        $expensesData = array(50, 4);

        // Passive Partial Mock
        $expenses = \Mockery::mock('\Workshop\Expenses', array(10))->shouldAllowMockingProtectedMethods()->makePartial();

        $expenses->shouldReceive('getBoughtProducts')->andReturn($expensesData);
        $expenses->shouldReceive('logDiscount')->andReturnUndefined();
        $bill = new Bill($expenses, true);
        $this->assertEquals(217.8, $bill->getBillForUser('felix'));
    }
}
