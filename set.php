<?php 

class SetInitial
{
    // ---------------
    // 初期値設定関数
    // ---------------
    public function initial_value() {
        for ($i = 0; $i < 10; $i++){
            for ($v = 0; $v < 10; $v++){
                $array[$i][$v] =  "-1";
            }
        }
        for ($y = 1; $y <= 8; $y++){
            for ($x = 1; $x <= 8; $x++){
                $array[$y][$x] = " 0";
            }
        }
        $array[4][4] = $array[5][5] = " 2";
        $array[4][5] = $array[5][4] = " 1";
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
