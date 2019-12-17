<?php
class usuarios extends controller{
	//metodo que genera la ruta /usuarios para mostrar la lista de todos los usuarios existentesy sus roles
	public function index(){
		require_once '../app/models/usuario.php';
		$this->autenticate();//verifica si esta en sesion o en linea
		$user=new Usuario();//crea la instancia
		$users=$user->all();
		 
		//Llamada a la vista
		$this->view('usuarios/index', ['users' => $users]);//muestra el html de la funcion
	}

	//metodo que genera la ruta /usuarios/show/:id para mostrar la informacion principal de los usuarios 
	public function show($id = ''){
		require_once("../app/models/usuario.php");
		$this->autenticate();//verifica si esta en sesion o en linea
		$user=new Usuario();//crea la instancia
		$users=$user->where("id",$id);
		$users=$users[0];
		//Llamada a la vista
		$this->view('usuarios/show', ['users' => $users]);//muestra el html de la funcion
	}

	//metodo que genera la ruta /usuarios/login para iniciar sesion
	public function login(){
		 
		//Llamada a la vista
		$this->view('usuarios/login', []);//muestra el html de la funcion
	}

	//metodo que genera la ruta /usuarios/logout para cerrar sesion
	public function logout(){
		setcookie("id_user_sesion_kawaii", "sesion off",time() - 120, "/");
		header("Location: http://localhost:8000/usuarios/login");
		//Llamada a la vista
		$this->view('usuarios/login', []);//muestra el html de la funcion
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
		$user=new Usuario();//crea la instancia
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
		$user=new Usuario();//crea la instancia
		$verify=$user->verify($cedula,$pass); //verifica si el usuario con cedula = $cedula y password = $pass existe y devuelve bool true, sino un false

		//esta seccion decide que hacer si el usuario existe o no, si existe setea el current_user, y de el se saca el id para pasarselo a la cookie que indica si tiene la sesion vigente o no
		if($verify){
			$current_user = $user->get_current_user($cedula,$pass);
			$id = strval($current_user[0]["id"]);
			setcookie("id_user_sesion_kawaii", $id ,time() + 3600, "/"); //Le da al usuario el tiempo en que puede estar en sesion, 3600 es 1 hora
			header("Location: http://localhost:8000/");
		}else{
			//redirige al login si el usuario no existe
			header("Location: http://localhost:8000/usuarios/login");
		}
	}
}
?>