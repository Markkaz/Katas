<?php

namespace Webdevils\Katas\Greeter;

use PHPUnit\Framework\TestCase;

class GreeterTest extends TestCase
{
    public function prepare_name_testcases() : array
    {
        return [
            ['Mark', 'Hello Mark'],
            ['John', 'Hello John'],
            ['   Mark   ', 'Hello Mark'],
            ['mark', 'Hello Mark'],
        ];
    }

    /**
     * @test
     * @dataProvider prepare_name_testcases
     */
    public function it_returns_hello_name_during_the_day($name, $expected)
    {
        $greeter = $this->createGreeter('T12:00');

        $this->assertEquals(
            $expected,
            $greeter->greet($name)
        );
    }

    /** @test */
    public function it_returns_good_morning_in_the_morning()
    {
        $greeter = $this->createGreeter('T06:00');

        $this->assertEquals(
            'Good morning Mark',
            $greeter->greet('Mark')
        );
    }

    /** @test */
    public function it_returns_good_evening_in_the_evening()
    {
        $greeter = $this->createGreeter('T18:00');

        $this->assertEquals(
            'Good evening Mark',
            $greeter->greet('Mark')
        );
    }

    /** @test */
    public function it_returns_good_night_in_the_night()
    {
        $greeter = $this->createGreeter('T22:00');

        $this->assertEquals(
            'Good night Mark',
            $greeter->greet('Mark')
        );

        $greeter = $this->createGreeter('T05:59');

        $this->assertEquals(
            'Good night Mark',
            $greeter->greet('Mark')
        );
    }

    private function createGreeter(string $currentTime): Greeter
    {
        return new Greeter(
            new TimeOfDay(
                $currentTime
            )
        );
    }
}
