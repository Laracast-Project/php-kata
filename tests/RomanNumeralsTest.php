<?php


use PHPUnit\Framework\TestCase;

class RomanNumeralsTest extends TestCase
{
    /**
     * @test *
     * @dataProvider check
     */
    function it_generates_the_roman_numeral_for_1($number, $numeral){
        $this->assertEquals($numeral, \App\RomanNumerals::generate($number));
    }

    /**  @test **/
    function it_cannot_generate_a_roman_numeral_less_than_1(){
        $this->assertFalse(\App\RomanNumerals::generate(0));
    }

    public function check(){
        return [
            [1, 'I'],
            [2, 'II'],
            [3, 'III'],
            [4, 'IV'],
            [5, 'V'],
            [6, 'VI'],
            [7, 'VII'],
            [8, 'VIII'],
            [9, 'IX'],
            [10, 'X'],

        ];
    }

}
