<?php
class administrativos extends controller{
	public function index(){
		echo 'administrativos/index';
		$this->view('administrativos/index', []);
	}

	public function show(){
		echo 'administrativos/show';
		$this->view('administrativos/show', []);
	}
}
?>