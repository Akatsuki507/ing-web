<?php
class administrativos extends controller{
	public function index(){
		$this->autenticate();
		$contenido = $_COOKIE["sesion"];
		$this->view('administrativos/index', ['contenido' => $contenido]);
	}

	public function show(){
		$this->autenticate();
		$this->view('administrativos/show', []);
	}
}
?>