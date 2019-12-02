<?php
//Llamada al modelo
require_once("models/usuario.php");
$user=new Usuario();
$datos=$user->all();
 
//Llamada a la vista
require_once("views/usuarios/index.phtml");
?>