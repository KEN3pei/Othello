<?php
session_name("othello");
session_start();
require_once "../view/formhelper.php";
require_once '../database/connect.php';

$user_id = $_POST['id'];
$result = get_othello($user_id);

if($result){
    $othello_array = unserialize($result["othello_array"]);
    $player = $result["player"];
    $pattern = $result['pattern'];

    $_SESSION["array"] = array_chunk($othello_array,6);
    $_SESSION["player"] = $player;
    $_SESSION["canput_count"] = $pattern;

    $form = new FormHelper;
    include 'check_set.php';
}else{
    $error = true;
    $form = new FormHelper;
    include 'check_set.php';
}