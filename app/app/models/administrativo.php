<?php
class Administrativo extends Model{
    protected $table = "administrativos";
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->usuarios=array();
    }

    public function new($nombre,$cedula, $nacimiento){
        $this->rows = null;
        $consulta=$this->db->query("insert into {$this->table}(nombre,cedula,fecha_nacimiento) values ($nombre, $cedula, $nacimiento);");
        return true;
    }

	public function attach_user($user_id, $administrativos_id){
        $this->rows = null;
        $consulta=$this->db->query("update usuarios set administrativos_id = $administrativos_id where id = $user_id;");
        return true;
    }

    public function new_titulo($titulo,$year,$institucion,$grado,$administrativos_id){
        $this->rows = null;
        $consulta=$this->db->query("insert into preparacion_administrativo (nombre , year , universidad , grado , administrativos_id) values ($titulo , $year, $institucion ,$grado , $administrativos_id);");
        return true;
    }

    public function titulos($id){
        $this->rows = null;
        $consulta=$this->db->query("select * from preparacion_administrativo where administrativos_id = $id;");
        while($filas=$consulta->fetch_assoc()){
            $this->rows[]=$filas;
        }
        return $this->rows;
    }

    public function new_familiar($nombre,$localizar_emergencia,$prioridad_localizar,$parentesco,$fecha_nacimiento,$telefono,$correo,$administrativos_id){
        $this->rows = null;
        $consulta=$this->db->query("insert into famila_administrativo (nombre ,localizar_emergencia , prioridad_localizar , parentesco , fecha_nacimiento , telefono , correo , administrativos_id) values ($nombre ,$localizar_emergencia ,$prioridad_localizar ,$parentesco ,$fecha_nacimiento ,$telefono , $correo, $administrativos_id);");
        return true;
    }

    public function familiares($id){
        $this->rows = null;
        $consulta=$this->db->query("select * from famila_administrativo where administrativos_id = $id;");
        while($filas=$consulta->fetch_assoc()){
            $this->rows[]=$filas;
        }
        return $this->rows;
    }

    public function update($id,$nombre,$fecha_nacimiento,$genero,$tipo_sangre,$estado_civil,$peso,$estatura,$provincia,$distrito,$corregimiento,$direccion,$telefono,$correo,$sede,$categoria,$departamento,$apartado_postal,$cargo,$representante_gobierno,$unidad){
        $this->rows = null;
        $consulta=$this->db->query("update usuarios set administrativos_id = $administrativos_id where id = $user_id; ");
        while($filas=$consulta->fetch_assoc()){
            $this->rows[]=$filas;
        }
        return $this->rows;
    }
}
?>
