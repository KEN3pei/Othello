<?php 

require 'set.php';
require 'change.php';
require 'canput.php';
// ---------------
// オセロ配列出力関数
// ---------------
function outPut($array){
    for ($i = 1; $i <= 8; $i++){
        for ($v = 1; $v <= 8; $v++){
            print_r($array[$i][$v]);
        }
        echo "\n";
    }
}
// -----------------------
// 標準入力関数
// -----------------------
function inPut($array, $player){
    echo "Y軸を選択 :";
    $y = rtrim(fgets(STDIN), "\n");
    echo "X軸を選択 :";
    $x = rtrim(fgets(STDIN), "\n");
    $change_othello = new Change;
    $change_othello->player = $player;
    $change_othello->y = $y;
    $change_othello->x = $x;
    $change_othello->array = $array;
    $array = $change_othello->allOthello();
    return $array;
}
// -----------------------
// playerをchangeさせて入力させる関数
// -----------------------
function changePlayerInput($array, $player){
    
    $buck_array = $array;
    while ($array === $buck_array){
        echo "next player is " . $player . "\n";
        $array = inPut($array, $player);
        outPut($array);
    }
    return $array;
}

$set = new SetInitial();
echo "player1か2を選択 ";
$player = $set->setPlayer();
$array = $set->initial_value();

$buck_array = $array;

$chechboard = new ChechBoard();
$chechboard->player = $player;
$chechboard->array = $array;
$canput_count = $chechboard->canPut($player, $array);

// オセロが置けなければ標準入力をさせ直す
while ($array == $buck_array){
    outPut($array);
    $array = inPut($array, $player);
    outPut($array);
}

while ($canput_count !== 0){

    $player = 3 - $player;

    $chechboard->player = $player;
    $chechboard->array = $array;
    $canput_count = $chechboard->canPut($player, $array);

    if ($canput_count == 0){
        $chechboard->player = 3 - $player;
        $canput_count = $chechboard->canPut($player, $array);
    
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
    $array = changePlayerInput($array, $player);

}
echo "置けるところがなくなりました\n";
echo "Player1は" . $one . "\n";
echo "Player2が" . $two;

//終わらせる条件
//置けるところがなくなれば終了
//0がなければ終了
