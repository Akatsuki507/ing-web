<?php
class administrativos extends controller{
	public function index(){
		require_once '../app/models/administrativo.php';
		$administrativo=new Administrativo();
		$administrativo=$administrativo->all();
		echo 'administrativos/index';

		$this->view('administrativos/index', ['administrativos' => $administrativo]);
	}

	public function show(){
		echo 'administrativos/show';
		$this->view('administrativos/show', []);
	}
	
	public function edit($id = ''){
		require_once("../app/models/usuario.php");
		
		$user=new Usuario();
		$users=$user->where("id",$id);
		 
		//Llamada a la vista
		$this->view('administrativos/edit', ['user' => $users]);
	}
}
?>