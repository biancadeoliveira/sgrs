<?php

/**
** Author: Bianca de Oliveira
** Date: 2018-03-18
** 
** Controller Login 
*/

namespace App\system\Controllers;

class LoginController
{
	
	function exibirLogin($request, $response, $args){
		
		$login = new \App\system\Views\Login();
		$r = $login->teste();
		$body = $response->getBody();
		$body->write($r);

	}

	function validarLogin(){
		$v = $_POST;
		var_dump($v);
	}

}