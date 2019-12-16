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

	public function create(){
		$this->autenticate();
		$user_id = $_POST['id'];
		$nombre = "'".$_POST['nombre']."'";
		$cedula = "'".$_POST['cedula']."'";
		$nacimiento = "'2000/1/1'"; //fecha de nacimiento default, despues el mismo usuario la puede editar
		require_once("../app/models/administrativo.php");
		$administrativo=new Administrativo();
		$administrativo->new($nombre,$cedula,$nacimiento); // crea el perfil docente
		$administrativo_id = $administrativo->where("cedula",$cedula); // se trae el perfil docente recien creado
		$administrativo_id = $administrativo_id[0]["id"];
		$administrativo->attach_user($user_id,$administrativo_id); // amarra el usuario a su nuevo perfil docente
		$administrativo_id = strval($user_id);
		header("Location: http://localhost:8000/usuarios/show/$user_id");
		exit;
		$this->view('administrativos/index', []);
	}
}
?>