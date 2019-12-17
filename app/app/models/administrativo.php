<?php
//sirve para poder consultar cierta informacion del perfil de un usuario tipo administrativo
class Administrativo extends Model{
    protected $table = "administrativos";
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->usuarios=array();
    }
    //insertar los datos nombre, cedula y fecha de nacimiento en la base de datos
    public function new($nombre,$cedula, $nacimiento){
        $this->rows = null;
        $consulta=$this->db->query("insert into {$this->table}(nombre,cedula,fecha_nacimiento) values ($nombre, $cedula, $nacimiento);");
        return true;
    }
    //sirve para unir el id_usuario con el id_administrativo del perfil recien creado
	public function attach_user($user_id, $administrativos_id){
        $this->rows = null;
        $consulta=$this->db->query("update usuarios set administrativos_id = $administrativos_id where id = $user_id;");
        return true;
    }
    //sirve para insertar los datos de un nuevo titulo que quiere registrar
    public function new_titulo($titulo,$year,$institucion,$grado,$administrativos_id){
        $this->rows = null;
        $consulta=$this->db->query("insert into preparacion_administrativo (nombre , year , universidad , grado , administrativos_id) values ($titulo , $year, $institucion ,$grado , $administrativos_id);");
        return true;
    }
    //sirve para consultar los titulos que tiene un administrativo
    public function titulos($id){
        $this->rows = null;
        $consulta=$this->db->query("select * from preparacion_administrativo where administrativos_id = $id;");
        while($filas=$consulta->fetch_assoc()){
            $this->rows[]=$filas;
        }
        return $this->rows;
    }
    //sirve para ingresar los datos de un nuevo familiar registrado de un administrativo
    public function new_familiar($nombre,$localizar_emergencia,$prioridad_localizar,$parentesco,$fecha_nacimiento,$telefono,$correo,$administrativos_id){
        $this->rows = null;
        $consulta=$this->db->query("insert into famila_administrativo (nombre ,localizar_emergencia , prioridad_localizar , parentesco , fecha_nacimiento , telefono , correo , administrativos_id) values ($nombre ,$localizar_emergencia ,$prioridad_localizar ,$parentesco ,$fecha_nacimiento ,$telefono , $correo, $administrativos_id);");
        return true;
    }
    //sirve para consultar los familiares de un administrativo
    public function familiares($id){
        $this->rows = null;
        $consulta=$this->db->query("select * from famila_administrativo where administrativos_id = $id;");
        while($filas=$consulta->fetch_assoc()){
            $this->rows[]=$filas;
        }
        return $this->rows;
    }

    //actualiza el administrativo en la base de datos
    public function update($id,$nombre,$fecha_nacimiento,$genero,$tipo_sangre,$estado_civil,$peso,$estatura,$provincia,$distrito,$corregimiento,$direccion,$telefono,$correo,$sede,$categoria,$departamento,$apartado_postal,$cargo,$representante_gobierno,$unidad){
        $this->rows = null;
        $consulta=$this->db->query("update administrativos set nombre = $nombre, fecha_nacimiento = $fecha_nacimiento , genero = $genero , tipo_sangre = $tipo_sangre , estado_civil = $estado_civil , peso = $peso , estatura = $estatura , provincia = $provincia , distrito = $distrito , corregimiento = $corregimiento , direccion = $direccion , telefono = $telefono , correo = $correo , sede = $sede , categoria = $categoria , departamento = $departamento , apartado_postal = $apartado_postal,cargo = $cargo , representante_gobierno = $representante_gobierno , unidad = $unidad where id = $id;");
        return true;
    }
}
?>
