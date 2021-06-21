<?php


namespace Webdevils\Katas\StringCalculator;


class IntegerList
{
    const UPPER_LIMIT = 1000;

    private array $integers;

    public function __construct(array $integers)
    {
        $this->integers = $integers;
    }

    public function sum(): int
    {
        return array_sum(
            $this->integers
        );
    }

    public function hasIntegers() : bool
    {
        return count($this->integers);
    }

    public function getNegativeIntegers(): IntegerList
    {
        return new IntegerList(
            array_filter(
                $this->integers,
                function ($i) {
                    return $i < 0;
                }
            )
        );
    }

    public function removeLargeNumbers(): IntegerList
    {
        return new IntegerList(
            array_filter(
                $this->integers,
                function ($i) {
                    return $i <= self::UPPER_LIMIT;
                }
            )
        );
    }

    public function getArray() : array
    {
        return $this->integers;
    }
}