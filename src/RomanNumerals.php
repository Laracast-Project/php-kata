<?php


namespace App;


class RomanNumerals
{
    const NUMERALS = [
        'X' => 10,
        'IX' => 9,
        'V' => 5,
        'IV' => 4,
        'I' => 1
    ];

    public static function generate($number)
    {
        $result = '';

        if ($number <= 0){
            return false;
        }

        foreach (static::NUMERALS as $numeral => $arabic){
            for (; $number >= $arabic; $number -= $arabic){
                $result .= $numeral;
            }
        }

        return $result;
    }
}