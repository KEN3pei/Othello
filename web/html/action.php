<?php

class Action{

    // -----------------------
    // canput関数 置けるところがあるか check & count
    // -----------------------
    function canPut($array, $player){
        $h = 4;
        $w = 4;
        $prev_array = $array;
        $canput_count = 0;
        for ($y = 1; $y <= $h; $y++){
            for ($x = 1; $x <= $w; $x++){
                $next_array = $this->changeArray($x, $y, $array, $player);
                if ($prev_array !== $next_array){
                    $canput_count++;
                }
            }
        }
        return $canput_count;
    }

    public function changeArray($x, $y, $array, $player){

        if ($y < 1 || $y > 4 || $x < 1 || $x > 4){
            return $array;
        }
        if ($array[$y][$x] !== "0"){
            return $array;
        }
        $array = $this->Top($x, $y, $array, $player);
        $array = $this->Under($x, $y, $array, $player);
        $array = $this->Right($x, $y, $array, $player);
        $array = $this->topRight($x, $y, $array, $player);
        $array = $this->topLeft($x, $y, $array, $player);
        $array = $this->Left($x, $y, $array, $player);
        $array = $this->underRight($x, $y, $array, $player);
        $array = $this->underLeft($x, $y, $array, $player);
        return $array;
    }

    // -----------------------
    // オセロ上方向 置き換え関数
    // -----------------------
    public function Top($x, $y, $array, $player){
        $buck_array = $array;
        if ($array[$y - 1][$x] == (3 - $player)){
            $array[$y][$x] = $player;
        }
        while ($array[$y - 1][$x] == (3 - $player)){
            $y--;
            $array[$y][$x] = $player;
            // 空白があれば中止&元に戻す,8まで行っても2がない場合元に戻す
            if ($array[$y - 1][$x] == "0" || $y == 1){
                $array = $buck_array;
                break;
            }
        }
        return $array;
    }
    // -----------------------
    // オセロ下方向 置き換え関数
    // -----------------------
    public function Under($x, $y, $array, $player) {
        $h = 4;
        $buck_array = $array;
        if ($array[$y + 1][$x] == (3 - $player)){
            $array[$y][$x] = $player;
        }
        while ($array[$y + 1][$x] == (3 - $player)){
            $y++;
            $array[$y][$x] = $player;
            // 空白があれば中止&元に戻す,8まで行っても2がない場合元に戻す
            if ($array[$y + 1][$x] == "0" || $y == $h){
                $array = $buck_array;
                break;
            }
        }
        return $array;
    }
    // -----------------------
    // オセロ右方向 置き換え関数
    // -----------------------
    public function Right($x, $y, $array, $player) {
        $w = 4;
        $buck_array = $array;
        if ($array[$y][$x + 1] == (3 - $player)){
            $array[$y][$x] = $player;
        }
        while ($array[$y][$x + 1] == (3 - $player)){
            $x++;
            $array[$y][$x] = $player;
            // 空白があれば中止&元に戻す,8まで行っても2がない場合元に戻す
            if ($array[$y][$x + 1] == "0" || $x == $w){
                $array = $buck_array;
                break;
            }
        }
        return $array;
    }
    // -----------------------
    // オセロ左方向 置き換え関数
    // -----------------------
    public function Left($x, $y, $array, $player) {
        $buck_array = $array;
        if ($array[$y][$x - 1] == (3 - $player)){
            $array[$y][$x] = $player;
        }
        while ($array[$y][$x - 1] == (3 - $player)){
            $x--;
            $array[$y][$x] = $player;
            // 空白があれば中止&元に戻す,8まで行っても2がない場合元に戻す
            if ($array[$y][$x - 1] == "0" || $x == 1){
                $array = $buck_array;
                break;
            }
        }
        return $array;
    }
    // -----------------------
    // オセロ左上方向 置き換え関数
    // -----------------------
    public function topLeft($x, $y, $array, $player){
        $buck_array = $array;
        if ($array[$y - 1][$x - 1] == (3 - $player)){
            $array[$y][$x] = $player;
        }
        while ($array[$y - 1][$x - 1] == (3 - $player)){
            $x--;
            $y--;
            $array[$y][$x] = $player;
            // 空白があれば中止&元に戻す,8まで行っても2がない場合元に戻す
            if ($array[$y - 1][$x - 1] == "0" || $x == 1 || $y == 1){
                $array = $buck_array;
                break;
            }
        }
        return $array;
    }
    // -----------------------
    // オセロ右上方向 置き換え関数
    // -----------------------
    public function topRight($x, $y, $array, $player){
        $w = 4;
        $buck_array = $array;
        if ($array[$y - 1][$x + 1] == (3 - $player)){
            $array[$y][$x] = $player;
        }
        while ($array[$y - 1][$x + 1] == (3 - $player)){
            $x++;
            $y--;
            $array[$y][$x] = $player;
            // 空白があれば中止&元に戻す,8まで行っても2がない場合元に戻す
            if ($array[$y - 1][$x + 1] == "0" || $x == $w || $y == 1){
                $array = $buck_array;
                break;
            }
        }
        return $array;
    }
    // -----------------------
    // オセロ左下方向 置き換え関数
    // -----------------------
    public function underLeft($x, $y, $array, $player){
        $h = 4;
        $buck_array = $array;
        if ($array[$y + 1][$x - 1] == (3 - $player)){
            $array[$y][$x] = $player;
        }
        while ($array[$y + 1][$x - 1] == (3 - $player)){
            $x--;
            $y++;
            $array[$y][$x] = $player;
            // 空白があれば中止&元に戻す,8まで行っても2がない場合元に戻す
            if ($array[$y + 1][$x - 1] == "0" || $x == 1 || $y == $h){
                $array = $buck_array;
                break;
            }
        }
        return $array;
    }
    // -----------------------
    // オセロ右下方向 置き換え関数
    // -----------------------
    public function underRight($x, $y, $array, $player){
        $h = 4;
        $w = 4;
        $buck_array = $array;
        if ($array[$y + 1][$x + 1] == (3 - $player)){
            $array[$y][$x] = $player;
        }
        while ($array[$y + 1][$x + 1] == (3 - $player)){
            $x++;
            $y++;
            $array[$y][$x] = $player;
            // 空白があれば中止&元に戻す,8まで行っても2がない場合元に戻す
            if ($array[$y + 1][$x + 1] == "0" || $x == $w || $y == $h){
                $array = $buck_array;
                break;
            }
        }
        return $array;
    }
}

?>