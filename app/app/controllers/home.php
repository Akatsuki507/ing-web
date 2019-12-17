<?php
//Funciona para dar la dirrecion base, en sentido de que si no vas a una ruta determinada, el programa te enviara al home de inmediato.
class home extends controller{
	public function index(){
		$this->autenticate(); 
		//Llamada a la vista home, para que muestre el html del home
		$this->view('home/index',[]);
	}
}
?>