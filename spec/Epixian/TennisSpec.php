<?php

namespace spec\Epixian;

use Epixian\Tennis;
use Epixian\Player;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TennisSpec extends ObjectBehavior
{
    protected $john;
    protected $jane;

    function let() 
    {
        $this->john = new Player('John', 0);
        $this->jane = new Player('Jane', 0);

        $this->beConstructedWith($this->john, $this->jane);
    }

    /** @test */
    public function it_scores_0_to_0()
    {
        $this->score()->shouldReturn('Love-All');
    }

    /** @test */
    public function it_scores_1_to_0()
    {
        $this->john->setPoints(1);
        $this->score()->shouldReturn('Fifteen-Love');
    }

    /** @test */
    public function it_scores_2_to_0()
    {
        $this->john->setPoints(2);
        $this->score()->shouldReturn('Thirty-Love');
    }

    /** @test */
    public function it_scores_3_to_0()
    {
        $this->john->setPoints(3);
        $this->score()->shouldReturn('Forty-Love');
    }

    /** @test */
    public function it_scores_4_to_0()
    {
        $this->john->setPoints(4);
        $this->score()->shouldReturn('Winner John');
    }

    /** @test */
    public function it_scores_0_to_4()
    {
        $this->jane->setPoints(4);
        $this->score()->shouldReturn('Winner Jane');
    }

    /** @test */
    public function it_scores_4_to_3()
    {
        $this->john->setPoints(4);
        $this->jane->setPoints(3);
        $this->score()->shouldReturn('Advantage John');
    }

    /** @test */
    public function it_scores_3_to_5()
    {
        $this->john->setPoints(3);
        $this->jane->setPoints(5);
        $this->score()->shouldReturn('Winner Jane');
    }

    /** @test */
    public function it_scores_3_to_3()
    {
        $this->john->setPoints(3);
        $this->jane->setPoints(3);
        $this->score()->shouldReturn('Deuce');
    }

}
