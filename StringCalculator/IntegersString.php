<?php


namespace Webdevils\Katas\StringCalculator;


class IntegersString
{
    const DEFAULT_DELIMITERS = "/,|\n/";

    private string $numbers;
    private string $delimiter;

    public function __construct(string $numbers)
    {
        if($this->containsDelimiter($numbers)) {
            $this->setCustomDelimiterAndNumbers($numbers);
        } else {
            $this->setDefaultDelimiterAndNumbers($numbers);
        }
    }

    private function setDefaultDelimiterAndNumbers(string $numbers): void
    {
        $this->numbers = $numbers;
        $this->delimiter = self::DEFAULT_DELIMITERS;
    }

    private function setCustomDelimiterAndNumbers(string $numbers): void
    {
        list($delimiter, $numbers) = explode("\n", $numbers, 2);

        $this->numbers = $numbers;
        $this->delimiter = $this->parseDelimiter($delimiter);
    }

    private function parseDelimiter(string $delimiter): string
    {
        return '/' . substr($delimiter, 2) . '/';
    }

    private function containsDelimiter(string $numbers)
    {
        return str_starts_with($numbers, '//');
    }

    public function getIntegers() : array
    {
        return preg_split($this->delimiter, $this->numbers);
    }
}