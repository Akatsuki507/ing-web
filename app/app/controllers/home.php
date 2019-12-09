<?php
class home extends controller{
	public function index(){
		require_once '../app/models/usuario.php';

		 
		//Llamada a la vista
		$this->view('home/index', []);
	}
}
?>