<?php
session_name("login");
session_start();
require_once "api.php";
require_once "view/formhelper.php";
require_once "database/connect.php";

if($_GET['info'] == "logout"){
    logout();
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($_POST['submit'] == "login"){
        list($errors, $input) = login_validate();
    }elseif($_POST['submit'] == "signup"){
        list($errors, $input) = signup_validate();
    }
    if($errors){
        show_form($errors);
    }else{
        process_form($input);
    }
}else{
    show_form();
}

function login_validate(){
    $input['name'] = trim($_POST['name'] ?? '');
    $input['password'] = trim($_POST['password'] ?? '');

    if(!empty($input['name']) || !empty($input['password'])){
        $stmt = $GLOBALS['db']->prepare('SELECT password FROM users WHERE name = ?');
        $stmt->execute((array)$input['name']);
        $row = $stmt->fetch();
        if($row){
            $password_ok = password_verify($input['password'], $row["password"]);
        }
        if(!$password_ok){
            $errors[] = 'Please enter a valid username and password';
        }
    }else{
        $errors[] = 'Please enter a valid username and password';
    }
    
    return array($errors, $input);
}

function signup_validate(){
    $input['name'] = trim($_POST['name'] ?? '');
    $input['password'] = trim($_POST['password'] ?? '');

    if(empty($input['name']) || !preg_match("/^[a-zA-Z0-9]+$/", $input['name'])){
        $errors[] = 'Please enter your name';
    }
    if(empty($input['password']) || !preg_match("/^[a-zA-Z0-9]+$/", $input['password'])){
        $errors[] = 'Please enter your password';
    }
    return array($errors, $input);
}

function show_form($errors = array()){

    $info = $_GET['info'] ?? 'login';
    $form = new FormHelper;
    include 'view/login_form.php';
}

function process_form($input){
    
    if($_POST['submit'] == "login"){
        //sessonにusernameをセットしてログイン状態にする
        $stmt = $GLOBALS['db']->prepare('SELECT id FROM users WHERE name = ?');
        $stmt->execute((array)$input['name']);
        $row = $stmt->fetch();
        
        $_SESSION['id'] = $row["id"];
        $_SESSION['username'] = $input['name'];

    }elseif($_POST['submit'] == "signup"){
        //nameとpasswordをdbにセットする
        $hashedpassword = password_hash($input['password'], PASSWORD_DEFAULT);
        insert_user($input['name'], $hashedpassword);
    }

    $info = $_GET['info'] ?? 'login';
    $api = new Api;
    $form = new FormHelper;
    include 'view/main_index.php';
}
