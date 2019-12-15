<?php
class Administrativo extends Model{
    protected $table = "administrativos";
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->usuarios=array();
    }
}
?>
