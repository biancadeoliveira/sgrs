<?php

/*
** Author: Bianca de Oliveira
** Date: 2018-04-06
**
** Controller do objeto Painel
*/

namespace App\system\Controllers;

class PainelController
{
	public static function GetExibir($arq, $dados = array()){
		// $path = $_SERVER['SCRIPT_FILENAME'];
		// $path_parts = pathinfo($path);
		// $c = $path_parts['dirname'];



		$teste = array (
			'Mesas',
			'Pedidos',
			'Reservas',
			'Pagamentos',
			'cidade'

		);

		$c = 'C:/xampp/htdocs/framework/app/system/Views/';
		include_once($c . 'menuSuperior.php');


		//include_once('..' . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . 'system.php');
		include_once($c . $arq . '.php');
	}
}