<?php 
// namespace Othello;

require 'set.php';
require 'change.php';
require 'canput.php';
require 'changeplayer.php';

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
$inoutput = new InOutPut;
while ($array == $buck_array){
    $inoutput->array = $array;
    $inoutput->player = $player;
    $inoutput->outPut();
    $array = $inoutput->inPut();
    $inoutput->array = $array;
    $inoutput->outPut();
}

$changeplayer = new ChangePlayer;
while ($canput_count !== 0){
    $player = 3 - $player;
    $chechboard->player = $player;
    $chechboard->array = $array;
    $canput_count = $chechboard->canPut();
    if ($canput_count == 0){
        $chechboard->player = 3 - $player;
        $canput_count = $chechboard->canPut();
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
    
    $changeplayer->player = $player;
    $changeplayer->array = $array;
    $array = $changeplayer->changePlayerInput();
}

echo "置けるところがなくなりました\n";
echo "Player1は" . $one . "\n";
echo "Player2が" . $two;

//終わらせる条件
//置けるところがなくなれば終了
//0がなければ終了
