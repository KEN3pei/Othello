<?php

class InOutPut
{
    public $player;
    public $array;

    // ---------------
    // オセロ配列出力関数
    // ---------------
    function outPut(){
        for ($i = 1; $i <= 8; $i++){
            for ($v = 1; $v <= 8; $v++){
                print_r($this->array[$i][$v]);
            }
            echo "\n";
        }
    }
    // -----------------------
    // 標準入力関数
    // -----------------------
    function inPut(){
        echo "Y軸を選択 :";
        $y = rtrim(fgets(STDIN), "\n");
        echo "X軸を選択 :";
        $x = rtrim(fgets(STDIN), "\n");
        $change_othello = new Change;
        $change_othello->player = $this->player;
        $change_othello->y = $y;
        $change_othello->x = $x;
        $change_othello->array = $this->array;
        $array = $change_othello->allOthello();
        return $array;
    }
}