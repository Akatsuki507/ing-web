<?php
class docentes extends controller{
	public function index(){
		$this->autenticate();
		$this->view('docentes/index', []);
	}

	public function show(){
		$this->autenticate();
		$this->view('docentes/show', []);
	}
}
?>