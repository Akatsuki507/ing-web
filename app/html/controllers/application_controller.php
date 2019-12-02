<?php

class application{
	protected $controller = 'usuario';
	protected $method = 'index';
	protected $params = [];
	public function __construct(){
		$this->parseUrl();
	}

	public function parseUrl(){
		if(isset($_GET['url'])) {
			echo $_GET['url'];
		}
	}
}
?>