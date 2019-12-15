<?php
class docentes extends controller{
	public function index(){
		echo 'docentes/index';
		$this->view('docentes/index', []);
	}

	public function show(){
		echo 'docentes/show';
		$this->view('docentes/show', []);
	}

	public function edit($id = ''){
		require_once("../app/models/usuario.php");
		
		$user=new Usuario();
		$users=$user->where("id",$id);
		 
		//Llamada a la vista
		$this->view('docentes/edit', ['user' => $users]);
	}
}
?>