<?php
session_start();
$_SESSION["newsession"] = "alfonso";
require_once '../app/init.php';

$app = new App;
?>