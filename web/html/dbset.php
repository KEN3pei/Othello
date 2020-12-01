<?php

require_once 'database/connect.php';

$array = $_POST['array'];
$player = $_POST['player'];
$pattern = $_POST['canput_count'];

if(insert_othello($array, $player, $pattern)){
    header( "Location: view/done.html" ) ;
	exit ;
}
