<?php
session_name("login");
session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $_SESSION["array"] = "";
    $_SESSION["player"] = "";
    $_SESSION["canput_count"] = "";

    header('Location: index.php');
    exit;
}
$link = $_GET['link'];
include 'confirm.php';