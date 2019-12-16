<?php
class Docente extends Model{
    protected $table = "docentes";
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->usuarios=array();
    }

    public function new($nombre,$cedula, $nacimiento){
        $consulta=$this->db->query("insert into {$this->table}(nombre,cedula,fecha_nacimiento) values ($nombre, $cedula, $nacimiento);");
        return true;
    }

	public function attach_user($user_id, $docente_id){
        $consulta=$this->db->query("update usuarios set docentes_id = $docente_id where id = $user_id;");
        return true;
    }
}
?>
