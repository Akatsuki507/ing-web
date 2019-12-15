<?php
class Usuario extends Model{
    protected $table = "usuarios";
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->usuarios=array();
    }

    public function verify($user, $password){
        $consulta=$this->db->query("select * from {$this->table} where cedula = $user and password = ".$password.";");
        while($filas=$consulta->fetch_assoc()){
            $this->rows[]=$filas;
        }

        if(empty($this->rows)){
        	return true;
        }else{
        	return false;
        }  
    }

    public function get_current_user($user, $password){
        $consulta=$this->db->query("select * from {$this->table} where cedula = $user and password = ".$password.";");
        while($filas=$consulta->fetch_assoc()){
            $this->rows[]=$filas;
        }

        return $this->rows;
    }
}
?>
