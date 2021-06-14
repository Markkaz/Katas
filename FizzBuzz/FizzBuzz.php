<?php


namespace Webdevils\Katas\FizzBuzz;


class FizzBuzz
{
    public function call($number) : string
    {
        if($number % 15 == 0) {
            return 'FizzBuzz';
        } elseif($number % 3 == 0) {
            return 'Fizz';
        } elseif($number % 5 == 0) {
            return 'Buzz';
        }

        return $number;
    }
}