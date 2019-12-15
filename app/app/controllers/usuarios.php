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

	public function sign_up(){
		 
		//Llamada a la vista
		$this->view('usuarios/sign_up', []);
	}

	public function auth(){
		$nombre = $_POST['nombre'];
		$pass = $_POST['pass'];
		require_once("../app/models/usuario.php");
		$user=new Usuario();
		$verify=$user->verify($nombre,$pass);
		if($verify){
			$current_user = $user->get_current_user($nombre,$pass);
			$current_user = strval($current_user["id"]);
			setcookie("sesion","sesion",time() + 30, "/");
			$galleta = $_COOKIE["sesion"]; 
			echo "if";
			$this->view('usuarios/auth', ['nombre' => $nombre, 'pass' => $pass, 'current_user' => $current_user, 'galleta' => $galleta]);
		}else{
			header("Location: http://localhost:8000/usuarios/login");
			echo "else";
		}

		$this->view('usuarios/auth', ['nombre' => $nombre, 'pass' => $pass]);
	}
}
?>