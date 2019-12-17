<?php
class controller{

	//metodo que permite amarrar las vistas a los controladores y el $data son los parametros que les pasaremos a las vistas para poderlos manipular en dicha vista
	public function view($view, $data = []){
		require_once '../app/views/' . $view . '.phtml';
	}

	//metodo que verifica si el usuario tiene una sesion activa, este metodo se llama desde casi todos los demas metodos
	public function autenticate(){
		//obtiene la cookie del navegador
		$contenido = $_COOKIE["id_user_sesion_kawaii"]; 
		if($contenido == null) {
			//uncomment para usar login
			header("Location: http://localhost:8000/usuarios/login");
			exit;
		}
		
	}

}
?>