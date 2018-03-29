<?php

//Pertence a namespace core
namespace Core;

class Route{

	private $routers;

	public function __construct(array $routers){
		$this->routers = $routers;
		$this->run();
	}

	//Pega a rota digitada pelo usuário
	private function getUrl(){
		return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	}

	private function run(){
		$url = $this->getUrl();
		$urls = explode('/', $url);
		print_r($urls);

		foreach ($this->routers as $route) {
			echo "<br>";
			$urls = explode('/', $url[0]); 
			echo "<br>";
			print_r($url);
		}
	}

}