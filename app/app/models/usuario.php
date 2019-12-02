<?php
class Usuario{
    private $db;
    private $usuarios;
    public $table = "usuarios";
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->usuarios=array();
    }
    public function all(){
        $consulta=$this->db->query("select * from $table;");
        while($filas=$consulta->fetch_assoc()){
            $this->usuarios[]=$filas;
        }
        return $this->usuarios;
    }
    public function where($col, $data){
        $consulta=$this->db->query("select * from {$this->table} where $col = $data;");
        while($filas=$consulta->fetch_assoc()){
            $this->usuarios[]=$filas;
        }
        return $this->usuarios;
    }
}
?>
