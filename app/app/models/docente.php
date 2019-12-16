<?php
class Docente extends Model{
    protected $table = "docentes";
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->usuarios=array();
    }

    public function new($nombre,$cedula, $nacimiento){
        $this->rows = null;
        $consulta=$this->db->query("insert into {$this->table}(nombre,cedula,fecha_nacimiento) values ($nombre, $cedula, $nacimiento);");
        return true;
    }

	public function attach_user($user_id, $docente_id){
        $this->rows = null;
        $consulta=$this->db->query("update usuarios set docentes_id = $docente_id where id = $user_id;");
        return true;
    }

    public function new_titulo($titulo,$year,$institucion,$grado,$docente_id){
        $this->rows = null;
        $consulta=$this->db->query("insert into preparacion_docente (nombre , year , universidad , grado , docentes_id) values ($titulo , $year, $institucion ,$grado , $docente_id);");
        return true;
    }

    public function titulos($id){
        $this->rows = null;
        $consulta=$this->db->query("select * from preparacion_docente where docentes_id = $id;");
        while($filas=$consulta->fetch_assoc()){
            $this->rows[]=$filas;
        }
        return $this->rows;
    }

    public function new_familiar($nombre,$localizar_emergencia,$prioridad_localizar,$parentesco,$fecha_nacimiento,$telefono,$correo,$docente_id){
        $this->rows = null;
        $consulta=$this->db->query("insert into famila_docente (nombre ,localizar_emergencia , prioridad_localizar , parentesco , fecha_nacimiento , telefono , correo , docentes_id) values ($nombre ,$localizar_emergencia ,$prioridad_localizar ,$parentesco ,$fecha_nacimiento ,$telefono , $correo, $docente_id);");
        return true;
    }

    public function familiares($id){
        $this->rows = null;
        $consulta=$this->db->query("select * from famila_docente where docentes_id = $id;");
        while($filas=$consulta->fetch_assoc()){
            $this->rows[]=$filas;
        }
        return $this->rows;
    }
}
?>
