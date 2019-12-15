<?php
class controller{

	public function view($view, $data = []){
		require_once '../app/views/' . $view . '.phtml';
	}

	public function autenticate(){
		$contenido = $_COOKIE["id_user_sesion_kawaii"]; 
		if($contenido == null) {
			//uncomment para usar login
			header("Location: http://localhost:8000/usuarios/login");
			exit;
		}
		
	}

}
?>