<?php

namespace Workshop\Tests;

use Workshop\Ranking;

class RankingTest extends \PHPUnit_Framework_TestCase
{
    public function testTopPlayers() {
        $m = \Mockery::mock('\Workshop\ResultsProvider');
        $data = array(
            'paco' => 134,
            'paca' => 1543,
            'juan' => 12,
            'pepe' => 38,
            'manu' => 99
        );
        $m->shouldReceive('getAll')->andReturn($data);
        $ranking = new Ranking($m);

        $result = $ranking->getTop3Players();

        $this->assertCount(3, $result);
        $this->assertEquals(array('paca', 'paco', 'manu'), $result);
    }
}
