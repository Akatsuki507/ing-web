<?php
class usuarios extends controller{
	public function index(){
		require_once '../app/models/usuario.php';
		$this->autenticate();
		$user=new Usuario();
		$users=$user->all();
		 
		//Llamada a la vista
		$this->view('usuarios/index', ['users' => $users]);
	}

	public function show($id = ''){
		require_once("../app/models/usuario.php");
		$this->autenticate();
		$user=new Usuario();
		$users=$user->where("id",$id);
		 
		//Llamada a la vista
		$this->view('usuarios/show', ['users' => $users]);
	}

	public function login(){
		 
		//Llamada a la vista
		$this->view('usuarios/login', []);
	}
}
?>