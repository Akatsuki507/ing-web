<?php
class administrativos extends controller{
	public function index(){
		$this->autenticate();
		$this->view('administrativos/index', []);
	}

	public function show(){
		$this->autenticate();
		$this->view('administrativos/show', []);
	}
}
?>