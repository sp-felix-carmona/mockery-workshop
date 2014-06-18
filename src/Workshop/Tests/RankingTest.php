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
        $playersRepository = \Mockery::mock('\Workshop\PlayersRepository');
        $players = array(
            'paco' => 134,
            'paca' => 99999,
            'juan' => 444444,
            'pepe' => 22222,
            'manu' => 99
        );

        $playersRepository->shouldReceive('getAll')->andReturn($players);
        $playersRepository->shouldReceive('delete')->withArgs(array('paca'));
        $playersRepository->shouldReceive('delete')->withArgs(array('juan'));
        $playersRepository->shouldReceive('delete')->withArgs(array('pepe'));

        $ranking = new Ranking($playersRepository);
        $ranking->cleanHackers();
    }

    public function testTopPremiumPlayer() {
        $playersRepository = \Mockery::mock('\Workshop\PlayersRepository');
        $players = array(
            'juan' => 12,
            'pepe' => 38,
            'manu' => 99
        );
        $playersRepository->shouldReceive('getAll')->andReturn($players);
        $playersRepository->shouldReceive('getPlayerObject->isPremium')->withArgs(array('juan'))->andReturn(true);
        $playersRepository->shouldReceive('getPlayerObject->isPremium')->withArgs(array('pepe'))->andReturn(true);
        $playersRepository->shouldReceive('getPlayerObject->isPremium')->andReturn(false);
        $ranking = new Ranking($playersRepository);
        $result = $ranking->getTopPremiumPlayer();
        $this->assertEquals('pepe', $result);
    }
}
