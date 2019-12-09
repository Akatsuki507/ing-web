<?php
class Docente extends Model{
    protected $table = "docentes";
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->usuarios=array();
    }
}
?>
