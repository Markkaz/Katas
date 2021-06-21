<?php


namespace Webdevils\Katas\StringCalculator;

class StringCalculator
{
    /** @throws NegativeNumber */
    public function add(string $numbers) : int
    {
        return $this->throwExceptionForNegativeNumbers(
            (new IntegersString($numbers))->getIntegers()
        )
            ->removeLargeNumbers()
            ->sum();
    }

    /** @throws NegativeNumber */
    public function throwExceptionForNegativeNumbers(IntegerList $integers): IntegerList
    {
        $negativeIntegers = $integers->getNegativeIntegers();
        if($negativeIntegers->hasIntegers()) {
            throw new NegativeNumber(
                sprintf(
                    'Negative numbers not allowed: [%s]',
                    implode(',', $negativeIntegers->getArray())
                )
            );
        }

        return $integers;
    }
}