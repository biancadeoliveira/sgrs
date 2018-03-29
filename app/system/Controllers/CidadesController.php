<?php

/*
** Author: Bianca de Oliveira
** Date: 2018-03-29
**
** Controller do objeto Cidades
*/

namespace App\system\Controllers;

use App\system\Models;

class CidadesController
{

	public function GetInserir(){


		echo('
			<form method="POST" action="http://localhost/framework/public/teste">
				<label>Nome da cidade</label>
				<input type="text" name="nome">
				
				<br>

				<label>Código Postal</label>
				<input type="text" name="codPostal">
				
				<br>

				<label>Estado</label>
				<input type="text" name="estado">
				
				<br>

				<label>Pais</label>
				<input type="text" name="pais">
				
				<br>

				<input type="submit" value="Enviar">

			</form>
		');


	}


	public function PostInserir(){

		$nome = $_POST['nome'];
		$codPostal = $_POST['codPostal'];
		$estado = $_POST['estado'];
		$pais = $_POST['pais'];

		//$dados = array('Paulistania', '1234578', 'SP', 'Brasil');

		$dados = array($nome, $codPostal, $estado, $pais);


		$cidade = new \App\system\Models\Cidades($dados);

		$cidade->inserir();


	}
	
}