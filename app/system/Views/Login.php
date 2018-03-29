<?php

/**
** Author: Bianca de Oliveira
** Date: 2018-03-18
** 
** Controller Login 
*/

namespace App\system\Views;

class Login
{
	
	function teste(){
		return "<br>Entrou na classe login view

		<form action='http://localhost/framework/public/app/login' method='POST'>

			<input type='text' name='nome'>
			<input type='text' name='email'>

			<input type='submit' value='enviar'>

		";

	}

}