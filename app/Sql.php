<?php

/*
** Author: Bianca de Oliveira
** Date: 2018-03-27
**
** Classe para conexão com o banco de dados
*/

namespace App;

/*
** 
**
** gerarConexao()  		| Conecta no banco de dados
** executarQuery() 		| Executa uma instrução no banco mas não retorna nenhum dados 		| $query: Instrução a ser executada | $var: Chaves e valores da Query
** executarSelect()		| Executa uma seleção no banco e retorna o resultado da query 		| $query: Instrução a ser executada | $var: Chaves e valores da Query
** bindParams()			| Recebe todos os dados do array e passa os pares para bindParams	| $stmt: query a ser executada 		| $var: Chaves e valores da Query
** bindParam()			| Recebe os pares e linka as chave com os valores 					| $stmt: query a ser executada 		| $key: Chave do pares 				| $var: Valor da chave
*/

class Sql
{

	private $conn;	

	//Método construtor da classe, 
	public function __construct(){
		$this->gerarConexao();		
	}

	
	//Função para abrir a conexão com o banco de dados
	private function gerarConexao(){
		
		try {
		
			//Instância o objeto de conexão do banco de dados
			$conn = new \PDO("mysql:host=localhost;dbname=sgrs_engenharia", "root", ""); 
			//Armazena a conexão na variavel $conn 
			$this->conn = $conn;

		} catch (PDOException $e){
			
			$e -> getMessage();
			return $e;

		}

	} //Fim da função gerarConexao

	
	//Executa um query, retorna os dados encontrados
	public function executarQuery($query, $var){

		$stmt = $this->conn->prepare(
		    $query 
		);

		$stmt = $this->bindParams($stmt, $var);

		$stmt->execute();

	}

	//Executa um query, retorna os dados encontrados
	public function executarSelect($query, $var){

		$stmt = $this->conn->prepare(
		    $query
		);

		$stmt = $this->bindParams($stmt, $var);

		
		$stmt->execute();

		$resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);

		return json_encode($resultado);

	}

	//Executa o bindValue da query a ser executada
	private function bindParams($stmt, $var){
		
		foreach ($var as $key => $value) {
			$stmt = $this->bindParam($stmt, $key, $value);
		}

		return $stmt;
	}

	//Executa o bindValue da query a ser executada
	private function bindParam($stmt, $key, $value){
		$stmt->bindParam($key, $value);
		return $stmt;
	}

}

