<?php

namespace Epixian;

use Epixian\Player;

class Tennis
{
    private $player1;
    private $player2;

    private $lookup = [
        0 => 'Love',
        1 => 'Fifteen',
        2 => 'Thirty',
        3 => 'Forty'
    ];

    public function __construct(Player $player1, Player $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }

    public function score()
    {
        if ($this->hasAWinner()) {
            return 'Winner ' . $this->winner()->name;
        }

        if ($this->isAdvantage()) {
            return 'Advantage ' . $this->winner()->name;
        }

        if ($this->isDeuce()) {
            return 'Deuce';
        }

        if ($this->tied()) {
            return $this->lookup[$this->player1->score] . '-All';
        }

        return $this->lookup[$this->player1->score] . '-' . $this->lookup[$this->player2->score];     
    }

    private function hasAWinner()
    {
        return $this->scoreIsFourOrMore() && $this->leadingByTwoOrMore();
    }

    private function winner()
    {
        return $this->player1->score > $this->player2->score 
            ? $this->player1 
            : $this->player2;
    }

    private function scoreIsFourOrMore()
    {
        return max([$this->player1->score, $this->player2->score]) >= 4;
    }

    private function scoreIsThreeOrMore()
    {
        return max([$this->player1->score, $this->player2->score]) >= 3;
    }

    private function leadingByTwoOrMore()
    {
        return abs($this->player1->score - $this->player2->score) >= 2;
    }

    private function leadingByOne()
    {
        return abs($this->player1->score - $this->player2->score) == 1;
    }

    private function tied()
    {
        return $this->player1->score == $this->player2->score;
    }

    private function isAdvantage()
    {
        return $this->scoreIsFourOrMore() && $this->leadingByOne();
    }

    private function isDeuce()
    {
        return $this->scoreIsThreeOrMore() && $this->tied();
    }
}
