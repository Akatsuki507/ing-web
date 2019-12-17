<?php
class Usuario extends Model{
    protected $table = "usuarios";
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->usuarios=array();
    }
    //sirve para insertar los datos en la cuenta del sistema del usuario
    public function new($name,$cedula, $password){
        $this->rows = null;
        $consulta=$this->db->query("insert into {$this->table}(name,cedula,password) values ($name,$cedula, $password);");
        return true;
    }
    //sirve para confirmar que confirmar si un usuario y clave, pertenecen a la base de datos y coinciden entre ellas
    public function verify($user, $password){
        $this->rows = null;
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
    //sirve para busca que usuario esta conectado al sistema.
    public function get_current_user($cedula, $password){
        $this->rows = null;
        $consulta=$this->db->query("select * from {$this->table} where cedula = $cedula AND password = $password;");
        while($filas=$consulta->fetch_assoc()){
            $this->rows[]=$filas;
        }

        return $this->rows;
    }
}
?>
