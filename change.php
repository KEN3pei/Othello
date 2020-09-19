<?php 

class Change
{
    public $player;
    public $y;
    public $x;
    public $array;
    // -----------------------
    // オセロ全方向 置き換え関数
    // -----------------------
    public function allOthello(){

        $y = $this->y;
        $x = $this->x;
        $player = $this->player;
        $array = $this->array;

        if ($y < 1 || $y > 8 || $x < 1 || $x > 8){
            return $array;
        }
        if ($array[$y][$x] !== " 0"){
            return $array;
        }

        $array = $this->othelloTop($player, $y, $x, $array);
        $array = $this->othelloUnder($player, $y, $x, $array);
        $array = $this->othelloRight($player, $y, $x, $array);
        $array = $this->othelloTopRight($player, $y, $x, $array);
        $array = $this->othelloTopLeft($player, $y, $x, $array);
        $array = $this->othelloLeft($player, $y, $x, $array);
        $array = $this->othelloUnderRight($player, $y, $x, $array);
        $array = $this->othelloUnderLeft($player, $y, $x, $array);
        return $array;
    }

    // -----------------------
    // オセロ上方向 置き換え関数
    // -----------------------
    public function othelloTop($player, $y, $x, $array){
        $buck_array = $array;
        if ($array[$y - 1][$x] == " " . (3 - $player)){
            $array[$y][$x] = " " . $player;
        }
        while ($array[$y - 1][$x] == " " . (3 - $player)){
            $y--;
            $array[$y][$x] = " " . $player;
            // 空白があれば中止&元に戻す,8まで行っても2がない場合元に戻す
            if ($array[$y - 1][$x] == " 0" || $y == 1){
                $array = $buck_array;
                break;
            }
        }
        return $array;
    }
    // -----------------------
    // オセロ下方向 置き換え関数
    // -----------------------
    public function othelloUnder($player, $y, $x, $array) {
        $buck_array = $array;
        if ($array[$y + 1][$x] == " " . (3 - $player)){
            $array[$y][$x] = " " . $player;
        }
        while ($array[$y + 1][$x] == " " . (3 - $player)){
            $y++;
            $array[$y][$x] = " " . $player;
            // 空白があれば中止&元に戻す,8まで行っても2がない場合元に戻す
            if ($array[$y + 1][$x] == " 0" || $y == 8){
                $array = $buck_array;
                break;
            }
        }
        return $array;
    }
    // -----------------------
    // オセロ右方向 置き換え関数
    // -----------------------
    public function othelloRight($player, $y, $x, $array) {
        $buck_array = $array;
        if ($array[$y][$x + 1] == " " . (3 - $player)){
            $array[$y][$x] = " " . $player;
        }
        while ($array[$y][$x + 1] == " " . (3 - $player)){
            $x++;
            $array[$y][$x] = " " . $player;
            // 空白があれば中止&元に戻す,8まで行っても2がない場合元に戻す
            if ($array[$y][$x + 1] == " 0" || $x == 8){
                $array = $buck_array;
                break;
            }
        }
        return $array;
    }
    // -----------------------
    // オセロ左方向 置き換え関数
    // -----------------------
    public function othelloLeft($player, $y, $x, $array) {
        $buck_array = $array;
        if ($array[$y][$x - 1] == " " . (3 - $player)){
            $array[$y][$x] = " " . $player;
        }
        while ($array[$y][$x - 1] === " " . (3 - $player)){
            $x--;
            $array[$y][$x] = " " . $player;
            // 空白があれば中止&元に戻す,8まで行っても2がない場合元に戻す
            if ($array[$y][$x - 1] == " 0" || $x == 1){
                $array = $buck_array;
                break;
            }
        }
        // output($array);
        return $array;
    }
    // -----------------------
    // オセロ左上方向 置き換え関数
    // -----------------------
    public function othelloTopLeft($player, $y, $x, $array){
        $buck_array = $array;
        if ($array[$y - 1][$x - 1] == " " . (3 - $player)){
            $array[$y][$x] = " " . $player;
        }
        while ($array[$y - 1][$x - 1] == " " . (3 - $player)){
            $x--;
            $y--;
            $array[$y][$x] = " " . $player;
            // 空白があれば中止&元に戻す,8まで行っても2がない場合元に戻す
            if ($array[$y - 1][$x - 1] == " 0" || $x == 1 || $y == 1){
                $array = $buck_array;
                break;
            }
        }
        return $array;
    }
    // -----------------------
    // オセロ右上方向 置き換え関数
    // -----------------------
    public function othelloTopRight($player, $y, $x, $array){
        $buck_array = $array;
        if ($array[$y - 1][$x + 1] == " " . (3 - $player)){
            $array[$y][$x] = " " . $player;
        }
        while ($array[$y - 1][$x + 1] == " " . (3 - $player)){
            $x++;
            $y--;
            $array[$y][$x] = " " . $player;
            // 空白があれば中止&元に戻す,8まで行っても2がない場合元に戻す
            if ($array[$y - 1][$x + 1] == " 0" || $x == 8 || $y == 1){
                $array = $buck_array;
                break;
            }
        }
        return $array;
    }
    // -----------------------
    // オセロ左下方向 置き換え関数
    // -----------------------
    public function othelloUnderLeft($player, $y, $x, $array){
        $buck_array = $array;
        if ($array[$y + 1][$x - 1] == " " . (3 - $player)){
            $array[$y][$x] = " " . $player;
        }
        while ($array[$y + 1][$x - 1] == " " . (3 - $player)){
            $x--;
            $y++;
            $array[$y][$x] = " " . $player;
            // 空白があれば中止&元に戻す,8まで行っても2がない場合元に戻す
            if ($array[$y + 1][$x - 1] == " 0" || $x == 1 || $y == 8){
                $array = $buck_array;
                break;
            }
        }
        return $array;
    }
    // -----------------------
    // オセロ右下方向 置き換え関数
    // -----------------------
    public function othelloUnderRight($player, $y, $x, $array){
        $buck_array = $array;
        if ($array[$y + 1][$x + 1] == " " . (3 - $player)){
            $array[$y][$x] = " " . $player;
        }
        while ($array[$y + 1][$x + 1] == " " . (3 - $player)){
            $x++;
            $y++;
            $array[$y][$x] = " " . $player;
            // 空白があれば中止&元に戻す,8まで行っても2がない場合元に戻す
            if ($array[$y + 1][$x + 1] == " 0" || $x == 8 || $y == 8){
                $array = $buck_array;
                break;
            }
        }
        return $array;
    }

}
