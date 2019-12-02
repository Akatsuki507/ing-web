<?php
class Conectar{
	public static function conexion(){
		$conexion= new mysqli("localhost:3306", "root", "12345", "db_administracion");
		if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: " . $mysqli->connect_error;}
    echo "ya valio madres";
		$conexion->query("SET NAMES 'utf8'");
		return $conexion;
	}
}
?>