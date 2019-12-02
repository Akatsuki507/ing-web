<?php
//Llamada al modelo
require_once("models/usuario.php");
$user=new Usuario();
$datos=$user->where("id",1);
 
//Llamada a la vista
require_once("views/usuarios/show.phtml");
?>