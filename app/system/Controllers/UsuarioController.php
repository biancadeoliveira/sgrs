<?php

/*
** Author: Lucas Gabriel
** Author: Bianca de Oliveira
** Date: 2018-03-30
**
** Controller do objeto Usuário
*/

namespace App\system\Controllers;

use App\system\Models;


class UsuarioController

{

public function GetInserirUsuario(){


		$cidadesDAO = new \App\system\Models\CidadesDAO();

		$ceps = $cidadesDAO->listarCep();
		$ceps = json_decode( $ceps );

		$cidades = $cidadesDAO->listarCidade();
		$cidades = json_decode( $cidades );

		echo('
			<form method="POST" action="http://localhost/git/sgrs/public/usuario">
				<label>CPF</label>
				<input type="text" name="cpf">
				
				<br>

				<label>Nome</label>
				<input type="text" name="nome">
				
				<br>

				<label>Senha</label>
				<input type="text" name="senha">
				
				<br>

				<label>data de nascimento</label>
				<input type="date" name="dataNasc">
				
				<br>

				<label>RG</label>
				<input type="text" name="rg">
				
				<br>
				
				<br><label>Telefone</label>
				<input type="text" name="telefone">
				
				<br>

				<br><label>Email</label>
				<input type="text" name="email">
				
				<br>

				<br><label>Função</label>
				<input type="text" name="funcao">
				
				<br>

				<br><label>Estado</label>
				<select name="estado">
		');

		foreach( $cidades as $cidade ) {
			echo '<option value="' . $cidade->codCidade . '">' . $cidade->estado . '</option>';
		}

		echo ('			
				</select>	
				<br>

				<br><label>CEP</label>');

		echo ('
				<input type="text" name="cep">
				
				<br>

				<br><label>Numero</label>
				<input type="text" name="numero">
				
				<br>

				<br><label>Complemento</label>
				<input type="text" name="complemento">
				
				<br>

				<input type="submit" value="Enviar">

			</form>
		');

}


public function PostInserirUsuario(){

		$cpf = $_POST['cpf'];
		$nome = $_POST['nome'];
		$senha = $_POST['senha'];
		$dataNasc = $_POST['dataNasc'];
		$rg= $_POST['rg'];
		$telefone = $_POST['telefone'];
		$email = $_POST['email'];
		$funcao = $_POST['funcao'];
		$estado = $_POST['estado'];
		$cep = $_POST['cep'];
		$numero= $_POST['numero'];
		$complemento = $_POST['complemento'];

		$dados = array($cpf, $nome, $senha, $dataNasc, $rg, $telefone, $email, $funcao, $estado, $cep, $numero, $complemento);

		$usuario = new \App\system\Models\Usuario( $dados );

		$usuario->inserirUsuario();

	}

}