<?php
require_once("inoutput.php");
require_once("initarray.php");

class ChangePlayer extends InitArray
{
    // -----------------------
    // playerをchangeさせて入力させる関数
    // -----------------------
    function changePlayerInput(){
        
        $buck_array = $this->array;
        $inoutput = new InOutPut;
        $inoutput->player = $this->player;
        $inoutput->array = $this->array;

        while ($this->array === $buck_array){
            echo "next player is " . $this->player . "\n";
            $this->array = $inoutput->inPut();
            $inoutput->array = $this->array;
            $inoutput->outPut();
        }
        return $this->array;
    }
}