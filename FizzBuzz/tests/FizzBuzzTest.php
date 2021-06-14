<?php

namespace Webdevils\Katas\FizzBuzz;

use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    private $game;

    protected function setUp() : void
    {
        $this->game = new FizzBuzz();
    }

    /**
     * @test
     * @dataProvider numbersAndOutput
     */
    public function it_plays_FizzBuzz($number, $gameOutput)
    {
        $this->assertEquals($gameOutput, $this->game->call($number));
    }

    public function numbersAndOutput()
    {
        return [
            [1, 1],
            [2, 2],
            [3, 'Fizz'],
            [5, 'Buzz'],
            [6, 'Fizz'],
            [10, 'Buzz'],
            [15, 'FizzBuzz'],
            [30, 'FizzBuzz'],
        ];
    }
}
