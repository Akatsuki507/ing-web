<?php
//sirve para poder consultar cierta informacion del perfil de un usuario tipo docente
class Docente extends Model{
    protected $table = "docentes";
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->usuarios=array();
    }
    //insertar los datos de un docente
    public function new($nombre,$cedula, $nacimiento){
        $this->rows = null;
        $consulta=$this->db->query("insert into {$this->table}(nombre,cedula,fecha_nacimiento) values ($nombre, $cedula, $nacimiento);");
        return true;
    }
    //sirve para unir el id_usuario con el id_docente del perfil recien creado
	public function attach_user($user_id, $docente_id){
        $this->rows = null;
        $consulta=$this->db->query("update usuarios set docentes_id = $docente_id where id = $user_id;");
        return true;
    }
    //sirve para insertar los datos de un nuevo titulo que quiere registrar
    public function new_titulo($titulo,$year,$institucion,$grado,$docente_id){
        $this->rows = null;
        $consulta=$this->db->query("insert into preparacion_docente (nombre , year , universidad , grado , docentes_id) values ($titulo , $year, $institucion ,$grado , $docente_id);");
        return true;
    }
    //sirve para consultar los titulos ya registrados del docente
    public function titulos($id){
        $this->rows = null;
        $consulta=$this->db->query("select * from preparacion_docente where docentes_id = $id;");
        while($filas=$consulta->fetch_assoc()){
            $this->rows[]=$filas;
        }
        return $this->rows;
    }
    //sirve para ingresar los datos de un nuevo familiar registrado de un docente
    public function new_familiar($nombre,$localizar_emergencia,$prioridad_localizar,$parentesco,$fecha_nacimiento,$telefono,$correo,$docente_id){
        $this->rows = null;
        $consulta=$this->db->query("insert into famila_docentes (nombre ,localizar_emergencia , prioridad_localizar , parentesco , fecha_nacimiento , telefono , correo , docentes_id) values ($nombre ,$localizar_emergencia ,$prioridad_localizar ,$parentesco ,$fecha_nacimiento ,$telefono , $correo, $docente_id);");
        return true;
    }
    //sirve para consultar los familiares ya registrados del docente
    public function familiares($id){
        $this->rows = null;
        $consulta=$this->db->query("select * from famila_docentes where docentes_id = $id;");
        while($filas=$consulta->fetch_assoc()){
            $this->rows[]=$filas;
        }
        return $this->rows;
    }

    //actualiza al docente en la base de datos
    public function update($id,$nombre,$fecha_nacimiento,$genero,$tipo_sangre,$estado_civil,$peso,$estatura,$provincia,$distrito,$corregimiento,$direccion,$telefono,$correo,$sede,$categoria,$departamento,$apartado_postal,$extension){
        $this->rows = null;
        $consulta=$this->db->query("update docentes set nombre = $nombre, fecha_nacimiento = $fecha_nacimiento , genero = $genero , tipo_sangre = $tipo_sangre , estado_civil = $estado_civil , peso = $peso , estatura = $estatura , provincia = $provincia , distrito = $distrito , corregimiento = $corregimiento , direccion = $direccion , telefono = $telefono , correo = $correo , sede = $sede , categoria = $categoria , departamento = $departamento , apartado_postal = $apartado_postal, extension = $extension  where id = $id;");
        return true;
    }
}
?>
