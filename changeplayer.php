<?php

class ChangePlayer
{
    public $player;
    public $array;
    // -----------------------
    // playerをchangeさせて入力させる関数
    // -----------------------
    function changePlayerInput(){
        
        $buck_array = $this->array;
        while ($this->array === $buck_array){
            echo "next player is " . $this->player . "\n";
            $this->array = inPut($this->array, $this->player );
            outPut($this->array);
        }
        return $this->array;
    }
}