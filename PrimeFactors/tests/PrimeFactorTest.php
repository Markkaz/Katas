<?php

namespace Webdevils\Katas\PrimeFactors;

use PHPUnit\Framework\TestCase;

class PrimeFactorTest extends TestCase
{
    /**
     * @test
     * @dataProvider list_of_numbers_and_prime_factors
     */
    public function returns_prime_factors_for_a_number(int $number, array $primeFactors)
    {
        $factor = new PrimeFactor();
        $this->assertEquals($primeFactors, $factor->factorize($number));
    }

    public function list_of_numbers_and_prime_factors() : array
    {
        return [
            [1, []],
            [2, [2]],
            [3, [3]],
            [4, [2, 2]],
            [5, [5]],
            [6, [2, 3]],
            [7, [7]],
            [8, [2, 2, 2]],
            [9, [3, 3]],
            [2*2*2*3*5*11*13*17*17*23, [2, 2, 2, 3, 5, 11, 13, 17, 17, 23]],
        ];
    }
}
