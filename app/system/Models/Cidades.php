<?php

/*
** Author: Bianca de Oliveira
** Author: Lucas Gabriel
** Date: 2018-03-28
**
** Classe Cidade Model
*/

namespace App\system\Models;


class Cidades
{
	
	private $nome;
	private $codPostal;
	private $estado;
	private $pais;


	//Método construtor
	public function __construct($dados){

		$this->setDados($dados);

	}

	//NOME
	public function getNome(){
		return $this->nome;
	}

	public function setNome($dado){
		$this->nome = $dado;
	}

	//CODIGO POSTAL
	public function getCodPostal(){
		$data = $this->codPostal;
		return $data;
	}

	public function setCodPostal($dado){
		$this->codPostal = $dado;
	}

	//ESTADO
	public function getEstado(){
		return $this->estado;
	}

	public function setEstado($dado){
		$this->estado = $dado;
	}

	//PAÍS
	public function getPais(){
		return $this->pais;
	}

	public function setPais($dado){
		$this->pais = $dado;
	}

	public function setDados($dados){

		$this->setNome($dados[0]);
		$this->setCodPostal($dados[1]);
		$this->setEstado($dados[2]);
		$this->setPais($dados[3]);

	}

	public function getDados(){		

		$dados = array(
			$this->getNome(),
			$this->getCodPostal(),
			$this->getEstado(),
			$this->getPais()
		);

		return $dados;
	}


	//Incluir Cidade no sistema
	public function inserir(){

		$dados = $this->getDados();
		$r = $this->verificarNull();

		if ($r == true) {
		 	echo "Erro! Existem valores em branco";
		} else {
		 	$dao = new \App\system\Models\CidadesDAO();
		 	$dao->insert($dados);
		}

	}

	private function verificarNull(){

		$dados = $this->getDados();

		foreach ($dados as $key => $value) {

			if(is_null($value) || empty($value) || $value == ""){
				//Tem nulo
				return true;
			}

 		}

 		//"nao tem nulo";
		return false;

	}

	private function validarCodPostal(){

		$cod = $this->getCodPostal();

		echo($cod);
	}

}