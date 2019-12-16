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
}
?>
