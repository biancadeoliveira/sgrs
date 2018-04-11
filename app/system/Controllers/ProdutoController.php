<?php
/**
 * Created by Lucas Gabriel.
 * User: LucasG
 * Date: 08/04/2018
 * Time: 20:21
 */

namespace App\system\Controllers;

use App\system\Models;

class ProdutoController
{
    public function GetInserirProduto($request, $response, $args)
    {

        $produtos = new \App\system\Models\Produto();
        $produtos = $produtos->selectProduto();

        echo('
			<form method="POST" action="http://localhost/git/sgrs/public/produto">
				
				<label>Código do Produto</label>
				<input type="text" name="codProduto">
				
			    <br>
			    <label>Código da categoria</label>
				<select name="codCategoria">
					<option value="1">Lanche</option>
					<option value="2">Bebida</option>
				</select>	
				<br>

				<label>Numero do Produto</label>
				<input type="text" name="numProduto">
				
				<br>

				<label>nome</label>
				<input type="text" name="nome">
				
				<br>

				<label>Descrição</label>
				<input type="text" name="descricao">
				
				<br>
				
				<br><label>Preço</label>
				<input type="text" name="preco">
				
				<br>

	            <input type="submit" value="Enviar">

			</form>');
    }

    public function PostInserirProduto(){

        $codProduto = $_POST['codProduto'];
        $codCategoria = $_POST['codCategoria'];
        $numProduto = $_POST['numProduto'];
        $nome = $_POST['nome'];
        $descricao= $_POST['descricao'];
        $preco = $_POST['preco'];


        $dados = array($codProduto, $codCategoria, $numProduto, $nome, $descricao, $preco);

        $produto = new \App\system\Models\Produto( $dados );

        $produto->inserirProduto();

    }



}//Fim da classe