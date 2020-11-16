<?php 
require_once("initarray.php");

class SetInitial extends InitArray
{
    // ---------------
    // 初期値設定関数
    // ---------------
    public function initial_value() {
        $h = $this->h;
        $w = $this->w;

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

    // -------------------
    // 初期player設定関数
    // -------------------
    public function setPlayer() {
        $player = trim(fgets(STDIN));
        if (!($player == "1" || $player == "2")){
            echo "入力ミスがありました\n";
            echo "player1か2を選択 ";
            $this->setPlayer();
        }
        return $player;
    }
}
