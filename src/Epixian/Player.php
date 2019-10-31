<?php

namespace Epixian;

class Player
{
    public $name;
    public $score;

    public function __construct($name, $score)
    {
        $this->name = $name;
        $this->score = $score;
    }

    public function setPoints($points)
    {
        $this->score = $points;
    }
}
