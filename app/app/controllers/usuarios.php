<?php
class usuarios extends controller{
	//metodo que genera la ruta /usuarios para mostrar la lista de todos los usuarios existentesy sus roles
	public function index(){
		require_once '../app/models/usuario.php';
		$this->autenticate();
		$user=new Usuario();
		$users=$user->all();
		 
		//Llamada a la vista
		$this->view('usuarios/index', ['users' => $users]);
	}

	//metodo que genera la ruta /usuarios/show/:id para mostrar la informacion principal de los usuarios 
	public function show($id = ''){
		require_once("../app/models/usuario.php");
		$this->autenticate();
		$user=new Usuario();
		$users=$user->where("id",$id);
		 
		//Llamada a la vista
		$this->view('usuarios/show', ['users' => $users]);
	}

	//metodo que genera la ruta /usuarios/login para iniciar sesion
	public function login(){
		 
		//Llamada a la vista
		$this->view('usuarios/login', []);
	}

	//metodo que genera la ruta /usuarios/logout para cerrar sesion
	public function logout(){
		setcookie("id_user_sesion_kawaii", "sesion off",time() - 120, "/");
		header("Location: http://localhost:8000/usuarios/login");
		//Llamada a la vista
		$this->view('usuarios/login', []);
	}

	//metodo que genera la ruta /usuarios/sign_up para registrar usuario
	public function sign_up(){
		 
		//Llamada a la vista
		$this->view('usuarios/sign_up', []);
	}

	//metodo para la creacion de un nuevo usuario
	public function create(){
		$nombre = "'".$_POST['nombre']."'";
		$cedula = "'".$_POST['cedula']."'";
		$pass = "'".$_POST['pass']."'";
		require_once("../app/models/usuario.php");
		$user=new Usuario();
		if($user->new($nombre,$cedula,$pass)){
			$current_user = $user->get_current_user($cedula,$pass);
			$id = strval($current_user[0]["id"]);
			setcookie("id_user_sesion_kawaii", $id,time() + 120, "/");
			header("Location: http://localhost:8000/");
			exit;
		}

		//Llamada a la vista
		$this->view('usuarios/sign_up', []);
	}

	//metodo de autenticacion de usuario
	public function auth(){
		//datos enviados por el form de /usuarios/login
		$cedula = "'".$_POST['cedula']."'";
		$pass = "'".$_POST['pass']."'";

		require_once("../app/models/usuario.php");
		$user=new Usuario();
		$verify=$user->verify($cedula,$pass); //verifica si el usuario con cedula = $cedula y password = $pass existe y devuelve bool true, sino un false

		//esta seccion decide que hacer si el usuario existe o no, si existe setea el current_user, y de el se saca el id para pasarselo a la cookie que indica si tiene la sesion vigente o no
		if($verify){
			$current_user = $user->get_current_user($cedula,$pass);
			$id = strval($current_user[0]["id"]);
			setcookie("id_user_sesion_kawaii", $id ,time() + 120, "/");
			$galleta = $_COOKIE["id_user_sesion_kawaii"]; 
			header("Location: http://localhost:8000/");
		}else{
			//redirige al login si el usuario no existe
			header("Location: http://localhost:8000/usuarios/login");
		}

		$this->view('usuarios/auth', ['nombre' => $nombre, 'pass' => $pass]);
	}
}
?>