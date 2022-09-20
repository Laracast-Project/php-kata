<?php


namespace App;


use Exception;
use function PHPUnit\Framework\matches;
use function PHPUnit\Framework\throwException;

class StringCalculator
{
    const MAX_NUMBER_ALLOWED = 1000;

    protected $delimiter = ",|\n";

    public function add(string $numbers){

        if (! $numbers){
            return 0;
        }

        $numbers = $this->parseString($numbers);

        $numbers = $this->disallowNegative($numbers)->ignoreGreaterThan1000($numbers);

        return array_sum($numbers);

    }

    protected function disallowNegative(array $numbers): StringCalculator
    {
        foreach ($numbers as $number){
            if ($number < 0){
                throw new Exception("Negative numbers are not allowed");
            }
        }

        return $this;
    }

    protected function ignoreGreaterThan1000(array $numbers){
        return array_filter($numbers, function ($number) {
            return $number <= self::MAX_NUMBER_ALLOWED;
        });
    }

    protected function parseString(string $numbers){
        $customDelimiter = '\/\/(.)\n';

        if (preg_match("/{$customDelimiter}/", $numbers, $matches)){
            $this->delimiter = $matches[1];

            $numbers = str_replace($matches[0], '', $numbers);
        }

        return preg_split("/{$this->delimiter}/", $numbers);
    }

}