<?php
session_name("login");
session_start();
require_once 'database/connect.php';

$array = $_POST['array'];
$player = $_POST['player'];
$pattern = $_POST['canput_count'];
$user_id = $_SESSION['id'];

if(exists_othello($user_id)){
    // var_dump(exists_othello($user_id));
    if(update_othello($array, $player, $pattern, $user_id)){
        include 'view/done.php';
    }
}else{
    if(insert_othello($array, $player, $pattern, $user_id)){
        include 'view/done.php';
    }
}