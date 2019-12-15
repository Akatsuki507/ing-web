<?php
class Model{
    protected $db;
    protected $rows;

 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->rows=array();
    }
    public function all(){
        $consulta=$this->db->query("select * from {$this->table};");
        while($filas=$consulta->fetch_assoc()){
            $this->rows[]=$filas;
        }
        return $this->rows;
    }
    public function where($col, $data){
        $consulta=$this->db->query("select * from {$this->table} where $col = $data;");
        while($filas=$consulta->fetch_assoc()){
            $this->rows[]=$filas;
        }
        return $this->rows;
    }
}
?>
