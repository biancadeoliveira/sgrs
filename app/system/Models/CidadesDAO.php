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


		$a = 'INSERT INTO cidade (nome, codPostal, estado, pais) VALUES (:NOME, :CODPOSTAL, :ESTADO, :PAIS)';
		
		$var = array(
			':NOME' => $data[0],
			':CODPOSTAL' => $data[1],
			':ESTADO' =>  $data[2],
			':PAIS' => $data[3]
		);

		$this->executar($a, 'executarQuery', $var);
	}

	public function search($data){

		$a = 'SELECT codCidade, nome FROM cidade WHERE estado = :ESTADO';
		
		$var = array(
			':ESTADO' => $data[0]
		);

		$this->executar($a, 'executarSelect', $var);
	}


	public function listarCep(){

		$a = 'SELECT * FROM cep';

		$result = $this->executar($a, 'executarSelect');
		return $result;
	}


	public function select(){

		$a = 'SELECT nome, codPostal, estado, pais FROM cidade ORDER BY nome';

		$result = $this->executar($a, 'executarSelect');
		return $result;
	}

	
	private function executar($a, $func, $var = array()){

		$db = new App\Sql();

		if(!empty($var) && !is_null($var)){
			$result = $db->$func($a, $var);
		} else{
			$result = $db->$func($a);
		}

		return $result;

	}


}