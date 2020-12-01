<?php
try{
    $db = new PDO('mysql:host=web_mysql_1;dbname=othello','root','pass');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    print "PDO connect error";
}

function insert_othello($array, $player, $pattern){

    $sql = 'INSERT INTO othello (othello_array, player, pattern) VALUES (:array, :player, :pattern)';
    $stmt = $GLOBALS['db']->prepare($sql);
    $serialized_array = serialize($array);
    $param = array(
        'array' => $serialized_array,
        'player' => $player,
        'pattern' => $pattern
    );
    $result = $stmt->execute($param);
    if(!$result){
        return false;
    }
    return true;
}

function get_othello($othello_id){

    $sql = 'SELECT * FROM othello WHERE othello_id = ?';
    $stmt = $GLOBALS['db']->prepare($sql);
    $param = $othello_id;
    $stmt->execute((array)$param);
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if(!$result){
        return false;
    }
    return $result;
}