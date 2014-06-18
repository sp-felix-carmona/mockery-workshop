<?php

namespace Workshop;

class Ranking
{
    protected $resultsProvider;

    public function __construct(ResultsProvider $resultsProvider) {
        $this->resultsProvider = $resultsProvider;
    }

    public function getTop3Players() {
        $playerResults = $this->resultsProvider->getAll();
        asort($playerResults);
        $playerResults = array_reverse($playerResults);
        $top3 = array_keys(array_slice($playerResults, 0, 3));
        return $top3;
    }
}
