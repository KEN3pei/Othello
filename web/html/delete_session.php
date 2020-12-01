<?php
session_start();

$_SESSION["array"] = "";
$_SESSION["player"] = "";
$_SESSION["canput_count"] = "";

header('Location: index.php');
exit;