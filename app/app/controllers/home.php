<?php
class home extends controller{
	public function index(){
		require_once '../app/models/usuario.php';
		$this->autenticate();
		 
		//Llamada a la vista
		$this->view('home/index', []);
	}
}
?>