<?php


namespace App;


class PrimeFactor
{

    public function generate($number): array
    {
        $factors = [];

        for ($divisor = 2; $number > 1; $divisor++){
            for (; $number % $divisor === 0; $number /= $divisor){
                $factors[] = $divisor;
            }
        }

        return $factors;
    }

}