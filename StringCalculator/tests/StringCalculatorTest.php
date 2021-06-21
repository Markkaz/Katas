<?php

namespace Webdevils\Katas\StringCalculator;

use PHPUnit\Framework\TestCase;

class StringCalculatorTest extends TestCase
{
    private StringCalculator $calculator;

    protected function setUp() : void
    {
        $this->calculator = new StringCalculator();
    }

    /** @test */
    public function an_empty_string_returns_zero()
    {
        $this->assertEquals(0, $this->calculator->add(''));
    }

    /** @test */
    public function a_single_number_should_return_that_number()
    {
        $this->assertEquals(3, $this->calculator->add('3'));
    }

    /** @test */
    public function two_numbers_separated_by_a_comma_should_return_the_sum()
    {
        $this->assertEquals(3, $this->calculator->add('1,2'));
    }

    /** @test */
    public function numbers_separated_by_newlines_and_commas_will_be_summed()
    {
        $this->assertEquals(6, $this->calculator->add("1,2\n3"));
    }

    /** @test */
    public function you_can_change_the_delimiter_to_a_semicolon()
    {
        $this->assertEquals(6, $this->calculator->add("//;\n1;2;3"));
    }

    /** @test */
    public function can_change_delimiter_to_an_arbitrary_length_custom_delimiter()
    {
        $this->assertEquals(6, $this->calculator->add("//;;;\n1;;;2;;;3"));
        $this->assertEquals(6, $this->calculator->add("//***\n1***2***3"));
    }

    /** @test */
    public function can_have_multiple_custom_delimiters()
    {
        $this->assertEquals(6, $this->calculator->add("//[*][%]\n1*2%3"));
    }

    /** @test */
    public function numbers_larger_than_1000_are_ignored()
    {
        $this->assertEquals(1001, $this->calculator->add('1000,1'));
        $this->assertEquals(8, $this->calculator->add('5,1001,3'));
    }

    /** @test */
    public function throws_exception_for_negative_numbers()
    {
        $this->expectException(NegativeNumber::class);
        $this->expectExceptionMessage('Negative numbers not allowed: [-1]');

        $this->calculator->add('-1,2');
    }
}
