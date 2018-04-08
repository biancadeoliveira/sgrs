<?php

/*
** Author: Lucas Gabriel
** Author: Bianca de Oliveira
** Date: 2018-03-30
**
** Classe Usuário DAO
*/

namespace App\system\Models;

use App;


class UsuarioDAO
{	

	public function insert($data){

		$a = 'INSERT INTO usuario (cpf, nome, senha, dataNasc, rg, telefone, email, funcao, estado, cep, numero, complemento) VALUES (:CPF, :NOME, :SENHA, :DATANASC, :RG, :TELEFONE, :EMAIL, :FUNCAO, :ESTADO, :CEP, :NUMERO, :COMPLEMENTO)';
		
		$var = array(
			':CPF' => $data[0],
			':NOME' => $data[1],
			':SENHA' =>  $data[2],
			':DATANASC' => $data[3],
			':RG' => $data[4],
			':TELEFONE' => $data[5],
			':EMAIL' => $data[6],
			':FUNCAO' => $data[7],
			':ESTADO' => $data[8],
			':CEP' => $data[9],
			':NUMERO' => $data[10],
			':COMPLEMENTO' => $data[11],		
		);

		$this->executar($a, $var, 'executarQuery');
	}



	public function executar($a, $var, $func){

		$db = new App\Sql();

		$db->$func($a, $var);

	}


}