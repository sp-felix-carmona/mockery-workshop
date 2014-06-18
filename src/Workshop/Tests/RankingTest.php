<?php

namespace Workshop\Tests;

use Workshop\Ranking;

class RankingTest extends \PHPUnit_Framework_TestCase
{
    public function testTopPlayers() {
        $playersRepository = \Mockery::mock('\Workshop\PlayersRepository');
        $players = array(
            'paco' => 134,
            'paca' => 1543,
            'juan' => 12,
            'pepe' => 38,
            'manu' => 99
        );
        $playersRepository->shouldReceive('getAll')->andReturn($players);
        $ranking = new Ranking($playersRepository);

        $result = $ranking->getTop3Players();

        $this->assertCount(3, $result);
        $this->assertEquals(array('paca', 'paco', 'manu'), $result);
    }

    public function testCleanHackers() {

    }
}
