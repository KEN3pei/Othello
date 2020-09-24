<?php 
// require_once("updatevar.php");
require_once("initarray.php");

class Change extends InitArray
{
    public $y;
    public $x;
    // -----------------------
    // オセロ全方向 置き換え関数
    // -----------------------
    public function allOthello(){

        $y = $this->y;
        $x = $this->x;
        $player = $this->player;
        $array = $this->array;
        $h = $this->h;
        $w = $this->w;

        if ($y < 1 || $y > $h || $x < 1 || $x > $w){
            return $array;
        }
        if ($array[$y][$x] !== " 0"){
            return $array;
        }
        $methods = ["Top", "Under", "Right", "topRight", "topLeft", "Left", "underRight", "underLeft"];
        foreach($methods as $method){
            $array = $this->$method($player, $y, $x, $array);
        }
        return $array;
    }

    // -----------------------
    // オセロ上方向 置き換え関数
    // -----------------------
    public function Top($player, $y, $x, $array){
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
    public function Under($player, $y, $x, $array) {
        $h = $this->h;
        $buck_array = $array;
        if ($array[$y + 1][$x] == " " . (3 - $player)){
            $array[$y][$x] = " " . $player;
        }
        while ($array[$y + 1][$x] == " " . (3 - $player)){
            $y++;
            $array[$y][$x] = " " . $player;
            // 空白があれば中止&元に戻す,8まで行っても2がない場合元に戻す
            if ($array[$y + 1][$x] == " 0" || $y == $h){
                $array = $buck_array;
                break;
            }
        }
        return $array;
    }
    // -----------------------
    // オセロ右方向 置き換え関数
    // -----------------------
    public function Right($player, $y, $x, $array) {
        $w = $this->w;
        $buck_array = $array;
        if ($array[$y][$x + 1] == " " . (3 - $player)){
            $array[$y][$x] = " " . $player;
        }
        while ($array[$y][$x + 1] == " " . (3 - $player)){
            $x++;
            $array[$y][$x] = " " . $player;
            // 空白があれば中止&元に戻す,8まで行っても2がない場合元に戻す
            if ($array[$y][$x + 1] == " 0" || $x == $w){
                $array = $buck_array;
                break;
            }
        }
        return $array;
    }
    // -----------------------
    // オセロ左方向 置き換え関数
    // -----------------------
    public function Left($player, $y, $x, $array) {
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
    public function topLeft($player, $y, $x, $array){
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
    public function topRight($player, $y, $x, $array){
        $w = $this->w;
        $buck_array = $array;
        if ($array[$y - 1][$x + 1] == " " . (3 - $player)){
            $array[$y][$x] = " " . $player;
        }
        while ($array[$y - 1][$x + 1] == " " . (3 - $player)){
            $x++;
            $y--;
            $array[$y][$x] = " " . $player;
            // 空白があれば中止&元に戻す,8まで行っても2がない場合元に戻す
            if ($array[$y - 1][$x + 1] == " 0" || $x == $w || $y == 1){
                $array = $buck_array;
                break;
            }
        }
        return $array;
    }
    // -----------------------
    // オセロ左下方向 置き換え関数
    // -----------------------
    public function underLeft($player, $y, $x, $array){
        $h = $this->h;
        $buck_array = $array;
        if ($array[$y + 1][$x - 1] == " " . (3 - $player)){
            $array[$y][$x] = " " . $player;
        }
        while ($array[$y + 1][$x - 1] == " " . (3 - $player)){
            $x--;
            $y++;
            $array[$y][$x] = " " . $player;
            // 空白があれば中止&元に戻す,8まで行っても2がない場合元に戻す
            if ($array[$y + 1][$x - 1] == " 0" || $x == 1 || $y == $h){
                $array = $buck_array;
                break;
            }
        }
        return $array;
    }
    // -----------------------
    // オセロ右下方向 置き換え関数
    // -----------------------
    public function underRight($player, $y, $x, $array){
        $h = $this->h;
        $w = $this->w;
        $buck_array = $array;
        if ($array[$y + 1][$x + 1] == " " . (3 - $player)){
            $array[$y][$x] = " " . $player;
        }
        while ($array[$y + 1][$x + 1] == " " . (3 - $player)){
            $x++;
            $y++;
            $array[$y][$x] = " " . $player;
            // 空白があれば中止&元に戻す,8まで行っても2がない場合元に戻す
            if ($array[$y + 1][$x + 1] == " 0" || $x == $w || $y == $h){
                $array = $buck_array;
                break;
            }
        }
        return $array;
    }

}
