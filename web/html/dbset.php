<?php
session_name("login");
session_start();
require_once 'database/connect.php';
require_once "view/formhelper.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $array = $_POST['array'];
    $player = $_POST['player'];
    $pattern = $_POST['pattern'];
    $user_id = $_POST['user_id'];

    // var_dump($user_id);
    if(exists_othello($user_id)){
        if(update_othello($array, $player, $pattern, $user_id)){
            include 'view/done.php';
        }
    }else{
        if(insert_othello($array, $player, $pattern, $user_id)){
            include 'view/done.php';
        }
    }
}else{
    $array = $_SESSION['array'];

    $form = new FormHelper;
    include 'checkset.php';
}


