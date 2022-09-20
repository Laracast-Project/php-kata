<?php


use App\StringCalculator;
use PHPUnit\Framework\TestCase;

class StringCalculatorTest extends TestCase
{
    /** @test */
    function it_evaluate_an_empty_string_as_0(){
        $calculate = new StringCalculator;

        $this->assertSame(0, $calculate->add(''));
    }

    /** @test */
    function it_find_the_sum_of_a_single_number(){
        $calculate = new StringCalculator;

        $this->assertSame(5, $calculate->add('5'));
    }

    /** @test */
    function it_find_the_sum_of_two_number(){
        $calculate = new StringCalculator;

        $this->assertSame(10, $calculate->add('5,5'));
    }

    /** @test */
    function it_find_the_sum_of_any_number(){
        $calculate = new StringCalculator;

        $this->assertSame(19, $calculate->add('5,5,5,4'));
    }

    /** @test */
    function it_accept_a_new_line_character_as_delimiter_too(){
        $calculate = new StringCalculator;

        $this->assertSame(10, $calculate->add("5\n5"));
    }

    /** @test */
    function negative_numbers_are_not_allowed(){
        $calculate = new StringCalculator;

        $this->expectException(\Exception::class);

        $calculate->add("5,-4");
    }

    /** @test */
    function numbers_greater_than_1000_are_ignored(){
        $calculate = new StringCalculator;

        $this->assertEquals(5, $calculate->add('5,1001'));
    }

    /** @test */
    function it_suppose_custom_delimiters(){
        $calculate = new StringCalculator;

        $this->assertEquals(9, $calculate->add("//:\n5:4"));
    }

}
