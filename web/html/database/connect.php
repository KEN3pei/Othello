<?php
try{
    $db = new PDO('mysql:host=web_mysql_1;dbname=othello','root','pass');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    print "PDO connect error";
}

function insert_othello($array, $player, $pattern, $user_id){

    $sql = 'INSERT INTO othello (othello_array, player, pattern, user_id) VALUES (:array, :player, :pattern, :user_id)';
    $stmt = $GLOBALS['db']->prepare($sql);
    $serialized_array = serialize($array);
    $param = array(
        'array' => $serialized_array,
        'player' => $player,
        'pattern' => $pattern,
        'user_id' => $user_id
    );
    $result = $stmt->execute($param);
    if(!$result){
        return false;
    }
    return true;
}

function update_othello($array, $player, $pattern, $user_id){

    $sql = 'UPDATE othello SET othello_array=?, player=?, pattern=? WHERE user_id = ?';
    $stmt = $GLOBALS['db']->prepare($sql);
    $serialized_array = serialize($array);
    $param = array(
        $serialized_array,
        $player,
        $pattern,
        $user_id,
    );
    $result = $stmt->execute($param);
    if(!$result){
        return false;
    }
    return true;
}

function get_othello($user_id){

    $sql = 'SELECT * FROM othello WHERE user_id = ?';
    $stmt = $GLOBALS['db']->prepare($sql);
    $stmt->execute((array)$user_id);
    $result = $stmt->fetch();

    if(!$result){
        return false;
    }
    return $result;
}

function exists_othello($user_id){

    $sql = 'SELECT user_id FROM othello WHERE user_id = ?';
    $stmt = $GLOBALS['db']->prepare($sql);
    $stmt->execute((array)$user_id);
    $result = $stmt->fetch();
    if(!$result){
        return false;
    }
    return $result;
}

function insert_user($name, $password){

    $sql = 'INSERT INTO users (name, password) VALUES (:name, :password)';
    $stmt = $GLOBALS['db']->prepare($sql);
    $param = array(
        'name' => $name,
        'password' => $password
    );
    $result = $stmt->execute($param);
    if(!$result){
        return false;
    }
    return true;
}