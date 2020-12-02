<?php
session_name("login");
session_start();
require_once "view/formhelper.php";
require_once "database/connect.php";

if($_GET['info'] == "logout"){
    logout();
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    list($errors, $input) = validate();
    if($errors){
        show_form($errors);
    }else{
        process_form($input);
    }
}else{
    show_form();
}

function validate(){
    $input['name'] = trim($_POST['name'] ?? '');
    $input['password'] = trim($_POST['password'] ?? '');

    if(!empty($input['name']) || !empty($input['password'])){
        $stmt = $GLOBALS['db']->prepare('SELECT password FROM users WHERE name = ?');
        $stmt->execute((array)$input['name']);
        $row = $stmt->fetch();
        
        if($row){
            //ここで本来はpassword_verifyを行う
            // $password_ok = password_verify($input['password'], $row);
            if($row['password'] === $input['password']){
                $password_ok = true;
            }else{
                $password_ok = false;
            }
        }
        if(!$password_ok){
            $errors[] = 'Please enter a valid username and password';
        }
    }else{
        $errors[] = 'Please enter a valid username and password';
    }
    
    return array($errors, $input);
}

function show_form($errors = array()){

    $info = $_GET['info'] ?? 'login';
    $form = new FormHelper;
    include 'view/login_form.php';
}

function process_form($input){
    
    //sessonにusernameをセットしてログイン状態にする
    $_SESSION['username'] = $input['name'];

    $info = $_GET['info'] ?? 'login';
    $form = new FormHelper;
    include 'main_index.php';
}

function logout(){

    $_SESSION['username'] = "";
    header('Location: login_signup.php');
    exit;

}