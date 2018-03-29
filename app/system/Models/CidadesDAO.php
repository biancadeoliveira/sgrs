<?php

/*
** Author: Bianca de Oliveira
** Author: Lucas Gabriel
** Date: 2018-03-28
**
** Classe CidadesDAO
** Implementa os métodos insert, select e busca do objeto Cidades
*/

namespace App\system\Models;

use App;

class CidadesDAO
{	

	public function insert($data){

		var_dump($data);


		$a = 'INSERT INTO cidade (nome, codPostal, estado, pais) VALUES (:NOME, :CODPOSTAL, :ESTADO, :PAIS)';
		
		$var = array(
			':NOME' => $data[0],
			':CODPOSTAL' => $data[1],
			':ESTADO' =>  $data[2],
			':PAIS' => $data[3]
		);

		$this->executar($a, $var, 'executarQuery');
	}

	public function select($data){

		$a = 'SELECT codCidade, nome FROM cidade WHERE estado = :ESTADO';
		
		$var = array(
			':ESTADO' => $data[0]
		);

		$this->executar($a, $var, 'executarSelect');
	}

	
	private function executar($a, $var, $func){

		$db = new App\Sql();

		$db->$func($a, $var);

	}


}