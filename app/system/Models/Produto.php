<?php
/**
 * Created Lucas Gabriel.
 * User: Lucas Gabriel
 * Date: 08/04/2018
 * Time: 19:28
 */


namespace App\system\Models;


class Produto
{
    private $codProduto;
    private $codCategoria;
    private $numProduto;
    private $nome;
    private $descricao;
    private $preco;

    public $camposNull = array(
        '1', '1', '1', '1', '1'
    );

    //Método construtor
    public function __construct($dados = array()){


        if(!empty($dados) && !is_null($dados)){
            $this->setDados($dados);
        }

    }

    //Código do Produto
    public function getCodProduto(){
        return $this->codProduto;
    }

    public function setCodProduto($dado){
        $this->codProduto = $dado;
    }

    //Código da categoria
    public function getCodCategoria(){
        return $this->codCategoria;

    }

    public function setCodCategoria($dado){
        $this->codCategoria = $dado;
    }

    //Numero do Produto
    public function getNumProduto(){
        return $this->numProduto;
    }

    public function setNumProduto($dado){
        $this->numProduto = $dado;
    }

    //Nome do Produto
    public function getNome(){
        return $this->nome;
    }

    public function setNome($dado){
        $this->nome = $dado;
    }

    //Descrição do Produto
    public function getDescricao(){
        return $this->descricao;
    }

    public function setDescricao($dado){
        $this->descricao = $dado;
    }

    //Preço do Produto
    public function getPreco(){
        return $this->preco;
    }

    public function setPreco($dado){
        $this->preco = $dado;
    }

    //Dados Null
    public function getDadosNull(){
        return $this->camposNull;
    }

    //Função set
    public function setDados($dados)
    {

        $this->setCodProduto($dados[0]);
        $this->setCodCategoria($dados[1]);
        $this->setNumProduto($dados[2]);
        $this->setNome($dados[3]);
        $this->setDescricao($dados[4]);
        $this->setPreco($dados[5]);

    }

    //Função get
    public function getDados(){

        $dados = array(
            $this->getCodProduto(),
            $this->getCodCategoria(),
            $this->getNumProduto(),
            $this->getNome(),
            $this->getDescricao(),
            $this->getPreco()
        );

        return $dados;
    }

    //Incluir Produto no sistema
    public function inserirProduto(){

        $dados = $this->getDados();
        $cn = $this->getDadosNull();

        $r = Validacao::verificarNullGeral($cn, $dados);

        if ($r == true) {
            $return = "Erro! Existem valores em branco";
        } else {
            $dao = new \App\system\Models\ProdutoDAO();
            $return = $dao->insert($dados);
        }
    }


    public function selectProduto(){

        $dao = new \App\system\Models\ProdutoDAO();
        return $dao->select();

    }


}