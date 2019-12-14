<?php
class Usuario extends Model{
    protected $table = "usuarios";
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->usuarios=array();
    }

    public function verify($user, $password){
        $consulta=$this->db->query("select * from {$this->table} where name = $user and password = ".$password.";");
        while($filas=$consulta->fetch_assoc()){
            $this->rows[]=$filas;
        }

        if(empty($this->rows)){
        	return true;
        }else{
        	return false;
        }  
    }
}
?>
