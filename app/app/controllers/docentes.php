<?php
class docentes extends controller{
	public function index(){
		$this->autenticate();
		require_once '../app/models/docente.php';
		$docente=new Docente();
		$docente=$docente->all();
		$this->view('docentes/index', ['docente' => $docente]);
	}

	public function show($id = ''){
		$this->autenticate();
		require_once("../app/models/docente.php");
		$docente=new Docente();
		$title=new Docente();
		$titles= $title->titulos($id);
		$docentes=$docente->where("id",$id);
		$docentes=$docentes[0];
		$this->view('docentes/show', ['docente' => $docentes, 'titles' => $titles, 'el_id' => $id]);
	}

	public function edit($id = ''){
		require_once("../app/models/usuario.php");
		
		$user=new Usuario();
		$users=$user->where("id",$id);
		 
		//Llamada a la vista
		$this->view('docentes/edit', ['user' => $users]);
	}

	public function create(){
		$this->autenticate();
		$user_id = $_POST['id'];
		$nombre = "'".$_POST['nombre']."'";
		$cedula = "'".$_POST['cedula']."'";
		$nacimiento = "'2000/1/1'"; //fecha de nacimiento default, despues el mismo usuario la puede editar
		require_once("../app/models/docente.php");
		$docente=new Docente();
		$docente->new($nombre,$cedula,$nacimiento); // crea el perfil docente
		$docente_id = $docente->where("cedula",$cedula); // se trae el perfil docente recien creado
		$docente_id = $docente_id[0]["id"];
		$docente->attach_user($user_id,$docente_id); // amarra el usuario a su nuevo perfil docente
		$user_id = strval($user_id);
		header("Location: http://localhost:8000/usuarios/show/$user_id");
		exit;
		$this->view('docentes/index', []);
	}

	public function add_titulo(){
		$this->autenticate();
		$titulo = "'".$_POST['titulo']."'";
		$year = "'".$_POST['year']."'";
		$institucion = "'".$_POST['universidad']."'";
		$grado = "'".$_POST['grado']."'";
		$docente_id = $_POST['docente_id'];
		require_once("../app/models/docente.php");
		$docente=new Docente();
		$docente->new_titulo($titulo,$year,$institucion,$grado,$docente_id);
		$docente_id = strval($docente_id);
		header("Location: http://localhost:8000/docentes/show/$docente_id");
		exit;
		$this->view('docentes/index', []);
	}
}
?>