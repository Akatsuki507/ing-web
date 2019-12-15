<?php
class Usuario extends Model{
    protected $table = "usuarios";
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->usuarios=array();
    }

    public function new($name,$cedula, $password){
        $consulta=$this->db->query("insert into{$this->table}(name,cedula,password) values ($name,$cedula, $password);");
        return true;
    }

    public function verify($user, $password){
        $consulta=$this->db->query("select * from {$this->table} where cedula = $user AND password = $password;");
        while($filas=$consulta->fetch_assoc()){
            $this->rows[]=$filas;
        }

        if(empty($this->rows)){
        	return false;
        }else{
        	return true;
        }  
    }

    public function get_current_user($user, $password){
        $consulta=$this->db->query("select * from {$this->table} where cedula = $user AND password = $password;");
        while($filas=$consulta->fetch_assoc()){
            $this->rows[]=$filas;
        }

        return $this->rows;
    }
}
?>
