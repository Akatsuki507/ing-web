<?php
class usuarios extends controller{
	public function index(){
		require_once '../app/models/usuario.php';
		$user=new Usuario();
		$datos=$user->all();
		 
		//Llamada a la vista
		require_once("../app/views/usuarios/index.phtml");
	}

	public function show($id = ''){
		require_once("../app/models/usuario.php");
		$user=new Usuario();
		$datos=$user->where("id",$id);
		 
		//Llamada a la vista
		require_once("../app/views/usuarios/show.phtml");
	}
}
?>