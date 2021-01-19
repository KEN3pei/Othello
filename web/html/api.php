<?php
require_once "action.php";

class Api{

    // Constructor Injection 
    protected $action;
    public function __construct(Action $action = null)
    {
        $this->action = $action ? $action : new Action;
    }

    //受け取ったpostを処理してarrayとplayerを返す
    public function getArrayPlayer($x, $y, $array, $player){

        $prev_array = $array;
        $canput_count = $this->action->canPut($array, $player);
        if($canput_count == "0"){
            $player = 3 - $player;
            $canput_count = $this->action->canPut($array, $player);
            return array($array, $player, $canput_count);
        }

        $next_array = $this->action->changeArray($x, $y, $array, $player);
        if($prev_array !== $next_array){
            $player = 3 - $player;
            $canput_count = $this->action->canPut($next_array, $player);
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
            return true;
        }else{
            return false;
        }
    }

    public function finish2($array){

        $canput_count_1 = $this->action->canPut($array, 1);
        $canput_count_2 = $this->action->canPut($array, 2);
        if($canput_count_1 == 0 && $canput_count_2 == 0){
            return false;
        }else{
            return true;
        }
    }
}

?>