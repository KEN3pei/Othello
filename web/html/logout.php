<?php
session_name("login");
session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    logout();
}else{
    $link = $_GET['link'];
    include 'confirm.php';
}

function logout(){
    $_SESSION["array"] = "";
    $_SESSION["player"] = "";
    $_SESSION["canput_count"] = "";
    $_SESSION['id'] = "";
    $_SESSION['username'] = "";
    header('Location: login_signup.php');
    exit;
}
