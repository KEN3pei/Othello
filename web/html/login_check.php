<?php
require_once "view/formhelper.php";
var_dump($_POST['name']);

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
    $input['x'] = filter_input(INPUT_POST, 'x', FILTER_VALIDATE_INT);
    if(is_null($input['x']) || ($input['x'] === false)){
        $errors[] = "x is validated";
    }
    $input['y'] = filter_input(INPUT_POST, 'y', FILTER_VALIDATE_INT);
    if(is_null($input['y']) || ($input['y'] === false)){
        $errors[] = "y is validated";
    }
    return array($errors, $input);
}

function show_form($errors = array()){

    $form = new FormHelper;
    include 'view/login.php';
}

function process_form($input){
    
    $form = new FormHelper;
    include 'view/main_index.php';
}