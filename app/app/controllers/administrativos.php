<?php
	//Es el indice de la seccion de administrativo, sirve para mostrar todos los usuarios tipo administrativo
class administrativos extends controller{
	public function index(){
		require_once '../app/models/administrativo.php';//conexion entre los controladores
		$administrativo=new Administrativo();
		$administrativo=$administrativo->all(); //Trae todos los administrativos registrados en la base de datos
		$this->view('administrativos/index', ['administrativos' => $administrativo]);
	}
	//Es la vista del perfil de cierto usuario de tipo administrativo, sirve para ver informacion detallada de este
	public function show($id = ''){
		require_once("../app/models/administrativo.php");//conexion entre los controladores
		$this->autenticate();//verifica si el usuario este ingresado al sistema
		$administrativo=new Administrativo();//crea una instancia
		$titles= $administrativo->titulos($id); //Trae todos los titulos que posee un administrativo
		$familiares= $administrativo->familiares($id); //Trae todos los familiares que posee un administrativo
		$administrativos=$administrativo->where("id",$id);//busca el administrativo que tenga el id que buscas
		$administrativos=$administrativos[0];
		//Llamada a la vista
		$this->view('administrativos/show', ['administrativo' => $administrativos, 'titles' => $titles, 'familiares' => $familiares]);
	}

	//Crea un nuevo perfil tipo administrativo, se registra en la base de datos 
	public function create(){
		$this->autenticate();
		$user_id = $_POST['id'];
		$nombre = "'".$_POST['nombre']."'";
		$cedula = "'".$_POST['cedula']."'";
		$nacimiento = "'2000/1/1'"; //fecha de nacimiento default, despues el mismo usuario la puede editar
		require_once("../app/models/administrativo.php");//conexion entre los controladores
		$administrativo=new Administrativo();// crea el perfil administrativo vacio
		$administrativo->new($nombre,$cedula,$nacimiento); // inserta la informacion antes ingresada en la base de datos
		$administrativo_id = $administrativo->where("cedula",$cedula); // se trae el perfil administrativo recien creado con la cedula
		$administrativo_id = $administrativo_id[0]["id"];
		$administrativo->attach_user($user_id,$administrativo_id); // amarra el usuario a su nuevo perfil docente
		$administrativo_id = strval($user_id);//convierte el user_id de entero a string
		header("Location: http://localhost:8000/usuarios/show/$user_id");
		exit;
		$this->view('administrativos/index', []);
	}
	
	//sirve para agregar un titulo al perfil de administrativo
	public function add_titulo(){
		$this->autenticate(); //verifica si el usuario este ingresado al sistema
		$titulo = "'".$_POST['titulo']."'";
		$year = "'".$_POST['year']."'";
		$institucion = "'".$_POST['universidad']."'";
		$grado = "'".$_POST['grado']."'";
		$administrativos_id = $_POST['administrativos_id'];
		require_once("../app/models/administrativo.php");//conexion entre los controladores
		$administrativo=new Administrativo();//crea una instancia
		$administrativo->new_titulo($titulo,$year,$institucion,$grado,$administrativos_id); //crea el titulo en la base de datos
		$administrativo = strval($administrativos_id);//convierte el administrativo_id de entero a string
		header("Location: http://localhost:8000/administrativos/show/$administrativos_id");
		exit;
		$this->view('administrativos/index', []);
	}

	//sirve para agregar un miembro familiar de un administrativo
	public function add_familiar(){
		$this->autenticate();//verifica si el usuario este ingresado al sistema
		$nombre = "'".$_POST['nombre']."'";
		$localizar_emergencia = "'".$_POST['localizar_emergencia']."'";
		$prioridad_localizar = $_POST['prioridad_localizar'];
		$parentesco = "'".$_POST['parentesco']."'";
		$fecha_nacimiento = "'".$_POST['fecha_nacimiento']."'";
		$telefono = "'".$_POST['telefono']."'";
		$correo = "'".$_POST['correo']."'";
		$administrativo_id = $_POST['administrativo_id'];
		require_once("../app/models/administrativo.php");//conexion entre los controladores
		$administrativo=new Administrativo();
		$administrativo->new_familiar($nombre,$localizar_emergencia,$prioridad_localizar,$parentesco,$fecha_nacimiento,$telefono,$correo,$administrativo_id);//ingresa los datos a la base de datos
		$administrativo_id = strval($administrativo_id);//convierte el administrativo_id de entero a string
		header("Location: http://localhost:8000/administrativos/show/$administrativo_id");
		exit;
		$this->view('administrativos/index', []);
	}
}
?>