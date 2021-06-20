<?php


namespace Webdevils\Katas\StringCalculator;


class StringCalculator
{
    public function add(string $numbers) : int
    {
        $integersString = new IntegersString($numbers);
        return array_sum($integersString->getIntegers());
    }
}