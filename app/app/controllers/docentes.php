<?php
class docentes extends controller{
	public function index(){
		echo 'docentes/index';
		$this->autenticate();
		$this->view('docentes/index', []);
	}

	public function show(){
		echo 'docentes/show';
		$this->autenticate();
		$this->view('docentes/show', []);
	}
}
?>