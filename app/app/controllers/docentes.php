<?php
class docentes extends controller{
	public function index(){
		echo 'docentes/index';
		$this->view('docentes/index', []);
	}

	public function show(){
		echo 'docentes/show';
		$this->view('docentes/show', []);
	}
}
?>