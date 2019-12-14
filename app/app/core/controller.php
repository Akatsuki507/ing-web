<?php
class controller{

	public function view($view, $data = []){
		require_once '../app/views/' . $view . '.phtml';
	}

	public function autenticate(){
		if ($_SESSION["newsession"] == "") {
			header("Location: http://localhost:8000/usuarios/login");
			exit;
		}
		
	}

}
?>