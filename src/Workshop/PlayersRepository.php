<?php

namespace Workshop;

interface PlayersRepository
{
    public function getAll();
    public function getPlayerObject($name);
}
