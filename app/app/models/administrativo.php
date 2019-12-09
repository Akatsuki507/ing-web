<?php
class Administrativo{
    private $db;
    private $docentes;
    public $table = "docentes";
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->usuarios=array();
    }
    public function all(){
        $consulta=$this->db->query("select * from {$this->table};");
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
