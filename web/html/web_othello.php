<?php
// http://localhost/programming/phps/Othello/web/web_othello.php

$initial = initial_value();
var_dump($initial);
echo "kensuke";

function initial_value() {
    $h = 4;
    $w = 4;

    for ($i = 0; $i < $h+2; $i++){
        for ($v = 0; $v < $w+2; $v++){
            $array[$i][$v] =  "-1";
        }
    }
    for ($y = 1; $y <= $h; $y++){
        for ($x = 1; $x <= $w; $x++){
            $array[$y][$x] = " 0";
        }
    }
    $array[$h/2][$w/2] = $array[($h/2)+1][($w/2)+1] = " 2";
    $array[$h/2][($w/2)+1] = $array[($h/2)+1][$w/2] = " 1";
    return $array;
}

?>