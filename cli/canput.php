<?php 
// require_once("updatevar.php");
require_once("initarray.php");

class CheckBoard extends InitArray
{
    // -----------------------
    // canput関数 置けるところがあるか check & count
    // -----------------------
    function canPut(){
        $h = $this->h;
        $w = $this->w;

        $change_othello = new Change;
        $change_othello->player = $this->player;
        $change_othello->array = $this->array;
        $canput_count = 0;
        for ($y = 1; $y <= $h; $y++){
            for ($x = 1; $x <= $w; $x++){
                $change_othello->y = $y;
                $change_othello->x = $x;
                $check_array = $change_othello->allOthello();
                if ($this->array !== $check_array){
                    $canput_count++;
                }
            }
        }
        return $canput_count;
    }
}



