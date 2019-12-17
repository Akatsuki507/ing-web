<?php
//Es el indice de la seccion de docente, sirve para mostrar todos los usuarios tipo docente
class docentes extends controller{
	public function index(){
		$this->autenticate();//verifica si el usuario este ingresado al sistema
		require_once '../app/models/docente.php';//conexion entre los controladores
		$docente=new Docente();//crea una instancia
		$docente=$docente->all();
		$this->view('docentes/index', ['docente' => $docente]);
	}

	//Es la vista del perfil de cierto usuario de tipo docente, sirve para ver informacion detallada de este
	public function show($id = ''){
		$this->autenticate();//verifica si el usuario este ingresado al sistema
		require_once("../app/models/docente.php");//conexion entre los controladores
		$docente=new Docente();//crea una instancia
		$titles= $docente->titulos($id);
		$familiares= $docente->familiares($id);
		$docentes=$docente->where("id",$id);//busca el docente que tenga el id que buscas
		$docentes=$docentes[0];
		$this->view('docentes/show', ['docente' => $docentes, 'titles' => $titles, 'familiares' => $familiares]);
	}

	//Crea un nuevo perfil tipo docente, se registra en la base de datos 
	public function create(){
		$this->autenticate();//verifica si el usuario este ingresado al sistema
		$user_id = $_POST['id'];
		$nombre = "'".$_POST['nombre']."'";
		$cedula = "'".$_POST['cedula']."'";
		$nacimiento = "'2000/1/1'"; //fecha de nacimiento default, despues el mismo usuario la puede editar
		require_once("../app/models/docente.php");//conexion entre los controladores
		$docente=new Docente();//crea una instancia
		$docente->new($nombre,$cedula,$nacimiento); // crea el perfil docente
		$docente_id = $docente->where("cedula",$cedula); // se trae el perfil docente recien creado con la cedula
		$docente_id = $docente_id[0]["id"];
		$docente->attach_user($user_id,$docente_id); // amarra el usuario a su nuevo perfil docente
		$user_id = strval($user_id);//convierte el id de entero a string
		header("Location: http://localhost:8000/usuarios/show/$user_id");
		exit;
		$this->view('docentes/index', []);
	}

	//sirve para agregar un titulo al perfil de docente
	public function add_titulo(){
		$this->autenticate();//verifica si el usuario este ingresado al sistema
		$titulo = "'".$_POST['titulo']."'";
		$year = "'".$_POST['year']."'";
		$institucion = "'".$_POST['universidad']."'";
		$grado = "'".$_POST['grado']."'";
		$docente_id = $_POST['docente_id'];
		require_once("../app/models/docente.php");//conexion entre los controladores
		$docente=new Docente();//crea una instancia
		$docente->new_titulo($titulo,$year,$institucion,$grado,$docente_id);//ingresa los datos a la base de datos
		$docente_id = strval($docente_id);//convierte el id de entero a string
		header("Location: http://localhost:8000/docentes/show/$docente_id");
		exit;
		$this->view('docentes/index', []);
	}

	//sirve para agregar un familiar del docente
	public function add_familiar(){
		$this->autenticate();//verifica si el usuario este ingresado al sistema
		$nombre = "'".$_POST['nombre']."'";
		$localizar_emergencia = "'".$_POST['localizar_emergencia']."'";
		$prioridad_localizar = $_POST['prioridad_localizar'];
		$parentesco = "'".$_POST['parentesco']."'";
		$fecha_nacimiento = "'".$_POST['fecha_nacimiento']."'";
		$telefono = "'".$_POST['telefono']."'";
		$correo = "'".$_POST['correo']."'";
		$docente_id = $_POST['docente_id'];
		require_once("../app/models/docente.php");//conexion entre los controladores
		$docente=new Docente();//crea una instancia
		$docente->new_familiar($nombre,$localizar_emergencia,$prioridad_localizar,$parentesco,$fecha_nacimiento,$telefono,$correo,$docente_id);//ingresa los datos a la base de datos
		$docente_id = strval($docente_id);//convierte el id de entero a string
		header("Location: http://localhost:8000/docentes/show/$docente_id");
		exit;
		$this->view('docentes/index', []);
	}


	//metodo que procesa la actualizacion
	public function update(){
		$this->autenticate();
		$id = $_POST['id'];
		$nombre = "'".$_POST['nombre']."'";
		$fecha_nacimiento = "'".$_POST['fecha_nacimiento']."'";
		$genero = "'".$_POST['genero']."'";
		$tipo_sangre = "'".$_POST['tipo_sangre']."'";
		$estado_civil = "'".$_POST['estado_civil']."'";
		$peso = $_POST['peso'];
		$estatura = $_POST['estatura'];
		$provincia = "'".$_POST['provincia']."'";
		$distrito = "'".$_POST['distrito']."'";
		$corregimiento = "'".$_POST['corregimiento']."'";
		$direccion = "'".$_POST['direccion']."'";
		$telefono = "'".$_POST['telefono']."'";
		$correo = "'".$_POST['correo']."'";
		$sede = "'".$_POST['sede']."'";
		$categoria = "'".$_POST['categoria']."'";
		$departamento = "'".$_POST['departamento']."'";
		$apartado_postal = "'".$_POST['apartado_postal']."'";
		$extension = "'".$_POST['extension']."'";
		require_once("../app/models/docente.php");
		$docente=new Docente();
		$docente->update($id,$nombre,$fecha_nacimiento,$genero,$tipo_sangre,$estado_civil,$peso,$estatura,$provincia,$distrito,$corregimiento,$direccion,$telefono,$correo,$sede,$categoria,$departamento,$apartado_postal,$extension);
		$id = strval($id);
		header("Location: http://localhost:8000/docentes/show/$id");
		exit;
	}
}
?>