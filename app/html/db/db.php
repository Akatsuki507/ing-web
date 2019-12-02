<?php
class Conectar{
	public static function conexion(){
		$conexion= new mysqli("ing-web-db", "root", "12345", "db_administracion");
		if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: " . $mysqli->connect_error;}
		$conexion->query("SET NAMES 'utf8'");
		return $conexion;
	}
}
?>