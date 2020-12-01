<?php
require_once "api.php";
require_once "view/formhelper.php";
require_once 'database/connect.php';

$othello_id = 12;
$result = get_othello($othello_id);

if($result){
    $othello_array = unserialize($result["othello_array"]);
    $player = $result["player"];
    $pattern = $result['pattern'];

    $_SESSION["array"] = array_chunk($othello_array,6);
    $_SESSION["player"] = $player;
    $_SESSION["canput_count"] = $pattern;

    $api = new Api;
    $form = new FormHelper;
    include 'view/check_set.php';
	exit ;
}