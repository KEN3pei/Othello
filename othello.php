<?php 

// ---------------
// 初期値設定関数
// ---------------
function initial_value() {
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
// ---------------
// オセロ配列出力関数
// ---------------
function output($array){
    for ($i = 1; $i <= 8; $i++){
        for ($v = 1; $v <= 8; $v++){
            echo $array[$i][$v];
        }
        echo "\n";
    }
}
// -----------------------
// オセロ上方向 置き換え関数
// -----------------------
function othello_top($player, $y, $x, $array){
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
function othello_under($player, $y, $x, $array){
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
function othello_right($player, $y, $x, $array) {
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
function othello_left($player, $y, $x, $array){
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
function othello_top_left($player, $y, $x, $array){
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
function othello_top_right($player, $y, $x, $array){
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
function othello_under_left($player, $y, $x, $array){
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
function othello_under_right($player, $y, $x, $array){
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
// -----------------------
// オセロ全方向 置き換え関数
// -----------------------
function all_othello($player, $y, $x, $array){
    if ($y < 1 || $y > 8 || $x < 1 || $x > 8){
        return $array;
    }
    if ($array[$y][$x] !== " 0"){
        return $array;
    }
    $array = othello_top($player, $y, $x, $array);
    $array = othello_under($player, $y, $x, $array);
    $array = othello_right($player, $y, $x, $array);
    // $array = othello_left($player, $y, $x, $array);
    $array = othello_top_right($player, $y, $x, $array);
    $array = othello_top_left($player, $y, $x, $array);
    $array = othello_left($player, $y, $x, $array);
    // output($array);
    $array = othello_under_right($player, $y, $x, $array);
    $array = othello_under_left($player, $y, $x, $array);
    return $array;
}
// -----------------------
// 標準入力関数
// -----------------------
function input($array, $player){
    echo "Y軸を選択 :";
    $y = rtrim(fgets(STDIN), "\n");
    echo "X軸を選択 :";
    $x = rtrim(fgets(STDIN), "\n");
    $array = all_othello($player, $y, $x, $array);
    return $array;
}
// -----------------------
// playerをchangeさせて入力させる関数
// -----------------------
function change_player_and_input($array, $player){
    $buck_array = $array;
    while ($array === $buck_array){
        echo "next player is " . $player . "\n";
        $array = input($array, $player);
        output($array);
    }
    return $array;
}
// -----------------------
// canput関数 置けるところがあるか check & count
// -----------------------
function canput($player, $array){
    $buck_array = $array;
    $canput_count = 0;
    for ($i = 1; $i <= 8; $i++){
        for ($v = 1; $v <= 8; $v++){
            $y = $i;
            $x = $v; 
            $check_array = all_othello($player, $y, $x, $array);
            if($check_array !== $buck_array && $array[$i][$v] == 0){
                $canput_y_x[] = [$y, $x]; 
                $canput_count++;
            }
        }
    }
    return $canput_count;
}


$array = initial_value();
$buck_array = $array;
$canput_count = 4;

echo "player1か2を選択 ";
$player = trim(fgets(STDIN));
if (!($player == "1" || $player == "2")){
    echo "入力ミスがありました";
    return ;
}

// オセロが置けなければ標準入力をさせ直す
while ($array === $buck_array){
    output($array);
    $array = input($array, $player);
    output($array);
}

// $player = 3 - $player;
// $array = change_player_and_input($array, $player);

while ($canput_count !== 0){
    $player = 3 - $player;
    $canput_count = canput($player, $array);
    if ($canput_count == 0){
        $canput_count = canput((3 - $player), $array);
        if ($canput_count == 0){
            $one = 0;
            $two = 0;
            foreach ($array as $value){
                foreach ($value as $num){
                    if ($num == 1){
                        $one += 1;
                    }elseif ($num == 2){
                        $two += 1;
                    }
                }
            }
            break;
        }
        echo "置けるところがないのでスキップします";
    }
    echo "置けるパターン数 : " . $canput_count . "パターン \n";
    $array = change_player_and_input($array, $player);

}
echo "置けるところがなくなりました\n";
echo "Player1は" . $one . "Player2が" . $two;

//終わらせる条件
//置けるところがなくなれば終了
//0がなければ終了

?>
