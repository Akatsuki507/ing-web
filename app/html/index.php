<?php
session_start();
$_SESSION["newsession"] = "";
require_once '../app/init.php';

$app = new App;
?>