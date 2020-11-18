<?php

class Api{
    //受け取ったpostを処理してarrayとplayerを返す
    public function getArrayPlayer($x, $y, $array, $player){

        $buck_array = $array;
        if ($array[$y - 1][$x] == (3 - $player)){
            $array[$y][$x] = $player;
        }
        while ($array[$y - 1][$x] == (3 - $player)){
            $y--;
            $array[$y][$x] = " " . $player;
            // 空白があれば中止&元に戻す,8まで行っても2がない場合元に戻す
            if ($array[$y - 1][$x] == " 0" || $y == 1){
                $array = $buck_array;
                break;
            }
        }
        $player = 3 - $player;

        return array($array, $player);
    }
}

?>