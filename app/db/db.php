<?php
class Conectar{
	public static function conexion(){
		$conexion=new mysqli("localhost:8082", "root", "12345", "db_administracion");
		$conexion->query("SET NAMES 'utf8'");
		return $conexion;
	}
}
?>