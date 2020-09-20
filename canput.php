<?php 
// namespace Othello;

// require 'change.php';

class ChechBoard 
{
    public $player;
    public $array;
    // -----------------------
    // canput関数 置けるところがあるか check & count
    // -----------------------
    function canPut(){

        $change_othello = new Change;
        $change_othello->player = $this->player;
        $change_othello->array = $this->array;

        $canput_count = 0;

        for ($y = 1; $y <= 8; $y++){
            for ($x = 1; $x <= 8; $x++){
                $change_othello->y = $y;
                $change_othello->x = $x;
                $check_array = $change_othello->allOthello();
                if ($change_othello->array !== $check_array && $change_othello->array[$y][$x] == 0){
                    $canput_count++;
                }
            }
        }
        return $canput_count;
    }
}



