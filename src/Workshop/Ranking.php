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
}
