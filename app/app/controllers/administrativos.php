<?php
class administrativos extends controller{
	public function index(){
		require_once '../app/models/administrativo.php';
		$administrativo=new Administrativo();
		$administrativo=$administrativo->all();
		$this->view('administrativos/index', ['administrativos' => $administrativo]);
	}

	public function show($id = ''){
		require_once("../app/models/administrativo.php");
		$this->autenticate();
		$administrativo=new Administrativo();
		$administrativo=$administrativo->where("id",$id);
		 
		//Llamada a la vista
		$this->view('administrativos/show', ['administrativo' => $administrativo]);
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