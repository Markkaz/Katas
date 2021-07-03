<?php


namespace Webdevils\Katas\PrimeFactors;


class PrimeFactor
{
    public function factorize(int $number) : array
    {
        $factors = [];
        $remainder = $number;
        $factor = 2;

        while($remainder > 1) {
            while($remainder % $factor == 0) {
                $factors[] = $factor;
                $remainder /= $factor;
            }

            $factor++;
        }

        return $factors;
    }
}