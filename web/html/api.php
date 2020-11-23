<?php
require_once "action.php";

class Api{
    //受け取ったpostを処理してarrayとplayerを返す
    public function getArrayPlayer($x, $y, $array, $player){

        $action = new Action;
        $prev_array = $array;
        $canput_count = $action->canPut($array, $player);
        if($canput_count == "0"){
            $player = 3 - $player;
            $canput_count = $action->canPut($array, $player);
            return array($array, $player, $canput_count);
        }

        $next_array = $action->changeArray($x, $y, $array, $player);
        if($prev_array !== $next_array){
            $player = 3 - $player;
            $canput_count = $action->canPut($next_array, $player);
        }
        return array($next_array, $player, $canput_count);
    }

    public function finish($array){
        $zero = 0;
        foreach($array as $values){
            foreach($values as $num){
                if($num == 0){
                    $zero++;
                }
            }
        }
        if($zero == 0){
            $action = new Action;
            $canput_count_1 = $action->canPut($array, 1);
            $canput_count_2 = $action->canPut($array, 2);
            if($canput_count_1 == 0 && $canput_count_2 == 0){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}

?>