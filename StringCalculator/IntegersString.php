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
        $newline = strpos($numbers, "\n");

        $this->delimiter = $this->parseDelimiters(
            substr(
                string: $numbers,
                offset: 2,
                length: $newline - 2
            )
        );

        $this->numbers = substr(
            string: $numbers,
            offset: $newline
        );
    }

    private function parseDelimiters(string $delimiterString): string
    {
        $delimiters = [$delimiterString];

        if($this->containsMultipleDelimiters($delimiterString)) {
            $delimiters = $this->parseMultipleDelimiters($delimiterString);
        }

        return $this->convertDelimitersToRegex($delimiters);
    }

    private function convertDelimitersToRegex(array $delimiters): string
    {
        return '/' . implode(
            '|',
            $this->regexEscapeDelimiters($delimiters)
        ) . '/';
    }

    private function regexEscapeDelimiters(array $delimiters): array
    {
        return array_map(
            function ($delimiter) {
                return preg_quote($delimiter);
            },
            $delimiters
        );
    }

    private function parseMultipleDelimiters(string $delimiterString): array
    {
        $matches = [];
        preg_match_all('/\[(.+?)\]/', $delimiterString, $matches);

        return $matches[1];
    }

    private function containsMultipleDelimiters(string $delimiterString): bool
    {
        return str_starts_with($delimiterString, '[')
            && str_ends_with($delimiterString, ']');
    }

    private function containsDelimiter(string $numbers)
    {
        return str_starts_with($numbers, '//');
    }

    public function getIntegers() : IntegerList
    {
        return new IntegerList(
            $this->castNumbersToInt(
                preg_split($this->delimiter, $this->numbers)
            )
        );
    }

    private function castNumbersToInt(array $numbers): array
    {
        return array_map(
            function ($i) {
                return (int)$i;
            },
            $numbers
        );
    }
}