<?php
class administrativos extends controller{
	public function index(){
		$this->autenticate();
		$contenido = $_COOKIE["sesion"];
		$this->view('administrativos/index', ['contenido' => $contenido]);
	}

	public function show(){
		$this->autenticate();
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