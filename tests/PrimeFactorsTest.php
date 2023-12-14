<?php


use App\PrimeFactor;
use PHPUnit\Framework\TestCase;

class PrimeFactorsTest extends TestCase
{
    /**
     * @test *
     * @dataProvider factors
     */
    function it_generate_prime_factor_for_1($number, $expected){
        $factors = new PrimeFactor;

        $this->assertEquals($expected, $factors->generate($number));
    }

    public function factors(): array
    {
        return [
            [1, []],
            [2, [2]],
            [3, [3]],
            [4, [2,2]],
        ];
    }

}
