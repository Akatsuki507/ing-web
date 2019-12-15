<?php
class Usuario extends Model{
    protected $table = "usuarios";
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->usuarios=array();
    }
}
?>
