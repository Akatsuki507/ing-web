<?php
class administrativos extends controller{
	public function index(){
		echo 'administrativos/index';
		$this->autenticate();
		$this->view('administrativos/index', []);
	}

	public function show(){
		echo 'administrativos/show';
		$this->autenticate();
		$this->view('administrativos/show', []);
	}
}
?>