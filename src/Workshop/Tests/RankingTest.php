<?php

namespace Workshop\Tests;

use Workshop\Ranking;

class RankingTest extends \PHPUnit_Framework_TestCase
{
    public function testTopPlayers() {
        $ranking = new Ranking();

        $result = $ranking->getTop3Players();

        $this->assertCount(3, $result);
        $this->assertEquals(array('paca', 'paco', 'manu'), $result);
    }
}
