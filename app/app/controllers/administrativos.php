<?php
class administrativos extends controller{
	public function index(){
		echo 'administrativos/index';
		$this->view('administrativos/index', []);
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