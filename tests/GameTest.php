<?php


use App\Game;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{

    /** @test **/
    function it_scores_a_gutter_game_as_zero(){
        $game = new Game();

        foreach (range(1, 20) as $roll){
            $game->roll(0);
        }

        $this->assertSame(0, $game->score());
    }

}
