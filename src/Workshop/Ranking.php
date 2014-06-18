<?php

namespace Workshop;

class Ranking
{
    protected $playersRepository;

    public function __construct(PlayersRepository $playersRepository) {
        $this->playersRepository = $playersRepository;
    }

    public function getTop3Players() {
        $playerResults = $this->playersRepository->getAll();
        asort($playerResults);
        $playerResults = array_reverse($playerResults);
        $top3 = array_keys(array_slice($playerResults, 0, 3));
        return $top3;
    }

    public function cleanHackers() {
        $playerResults = $this->playersRepository->getAll();
        foreach($playerResults as $name => $points) {
            if($points > 9999) {
                $this->playersRepository->delete($name);
            }
        }
    }

    public function getTopPremiumPlayer() {
        $playerResults = $this->playersRepository->getAll();
        $rank = array();
        foreach ($playerResults as $name => $points) {
            if($this->isPremiumRanking($name)) {
                $rank[$name] = $points;
            }
        }
        asort($rank);
        $rank = array_keys(array_reverse($rank));
        return $rank[0];
    }

    public function isPremiumRanking($name) {
        $playerObject = $this->playersRepository->getPlayerObject($name);
        return $playerObject->isPremium($name);
    }
}
