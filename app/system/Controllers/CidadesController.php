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

	private $teste = "Bianca";

	public function GetInserir($request, $response, $args){
		
		$this->teste;

		$cidade = new \App\system\Models\Cidades();
		$cidades = $cidade->select();

		PainelController::GetExibir('formCidade', $cidades);
	}

	public function PostInserir($request, $response, $args){

		$nome = $_POST['nome'];
		$codPostal = $_POST['codPostal'];
		$estado = $_POST['estado'];
		$pais = $_POST['pais'];

		//$dados = array('Paulistania', '1234578', 'SP', 'Brasil');

		$dados = array($nome, $codPostal, $estado, $pais);


		$cidade = new \App\system\Models\Cidades($dados);

		$result = $cidade->inserir();

		// \Core\Request::newR('GET', 'http://localhost/framework/public/painel/cidade');

		header("Location: http://localhost/framework/public/painel/cidade");

	}

	public function DeleteCidade($request, $response, $args){

		$cidade = new \App\system\Models\Cidades();


		$result = $cidade->excluir($args['idcidade']);

		header("Location: http://localhost/framework/public/painel/cidade");

		

	}
	
}