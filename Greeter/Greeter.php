<?php


namespace Webdevils\Katas\Greeter;


class Greeter
{
    private TimeOfDay $timeOfDay;

    public function __construct(TimeOfDay $timeOfDay)
    {
        $this->timeOfDay = $timeOfDay;
    }

    public function greet(string $name) : string
    {
        return $this->createGreeting() . ' ' . $this->prepareName($name);
    }

    private function createGreeting(): string
    {
        if($this->timeOfDay->isNight()) {
            return 'Good night';
        } elseif($this->timeOfDay->isEvening()) {
            return 'Good evening';
        } elseif ($this->timeOfDay->isMorning()) {
            return 'Good morning';
        }

        return 'Hello';
    }

    private function prepareName(string $name): string
    {
        return ucfirst(
            trim(
                $name
            )
        );
    }
}