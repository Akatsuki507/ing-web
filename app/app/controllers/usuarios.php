<?php
class usuarios extends controller{
	public function index(){
		require_once '../app/models/usuario.php';
		$user=new Usuario();
		$users=$user->all();
		 
		//Llamada a la vista
		$this->view('usuarios/index', ['users' => $users]);
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