<?php


namespace Webdevils\Katas\Greeter;


class TimeOfDay
{
    private \DateTimeImmutable $currentTime;

    public function __construct(string $time)
    {
        $this->currentTime = new \DateTimeImmutable($time);
    }

    public function isNight(): bool
    {
        return $this->currentTime >= (new \DateTimeImmutable('T22:00'))
            || $this->currentTime < (new \DateTimeImmutable('T06.00'));
    }

    public function isEvening(): bool
    {
        return $this->currentTime >= (new \DateTimeImmutable('T18:00'));
    }

    public function isMorning(): bool
    {
        return $this->currentTime < (new \DateTimeImmutable('T12:00'));
    }
}