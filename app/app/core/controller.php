<?php
class controller{

	public function view($view, $data = []){
		require_once '../app/views/' . $view . '.phtml';
	}

	public function autenticate(){
		$contenido = $_COOKIE["sesion"]; 
		if ($contenido =! "hay sesion") {
			header("Location: http://localhost:8000/usuarios/login");
			exit;
		}
		
	}

}
?>