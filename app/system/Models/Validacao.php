<?php

/* Classe com métodos de validação 
** Author: Bianca de Oliveira
** 		   Lucas Gabriel
** Date: 2018-04-07
*/

namespace App\system\Models;

use App\system\Models;

class Validacao
{
	
	/* Função para verificar se o campo obrigatório é null
	** Recebe como entrada dois arrays, um contendo as sequencia de 0 e 1 para identificar se o campo pode ser null (0) ou não (1).
	*/
	public static function verificarNullGeral($camposNull, $dados){

		//Percorre o array camposNull
		foreach ($camposNull as $key => $value) {
			
			//Para cada chave, verifica se o valor é 1 ou 0, caso seja 1 significa que o campo é obrigatório, portanto deve ser validado.
			if($value == '1'){

				//Verifica no array de dados, se o valor da chave corresponte é nula, vazia ou em branco, se qualquer uma dessas verificações for verdadeira, retornamos TRUE, ou seja, existe um campo obrigatório que não foi preenchido.
				if(is_null($dados[$key]) || empty($dados[$key]) || $dados[$key] == ""){
						return true;
		 		}
			}
		}

		//Nenhum campo obrigatório estava vazio, portanto, retorna false.
		return false;

	}	
}