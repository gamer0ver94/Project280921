<?php

namespace App\PingPong;
//
class Game
{
    public $set;
    public $sets = [];

    public function createSet($newGame)
    {
        $newGame->set = new Set();
    }
}
