<?php
/**
 * Created by Lucas Gabriel.
 * User: LucasG
 * Date: 08/04/2018
 * Time: 19:53
 */

namespace App\system\Models;

use App;

    class ProdutoDAO
    {
        public function insert($data){


            $a = 'INSERT INTO produto (codProduto, codCategoria, numProduto, nome, descricao, preco) VALUES (:CODPRODUTO, :CODCATEGORIA, :NUMPRODUTO, :NOME, :DESCRICAO, :PRECO)';

            $var = array(
                ':CODPRODUTO' => $data[0],
                ':CODCATEGORIA' => $data[1],
                ':NUMPRODUTO' =>  $data[2],
                ':NOME' => $data[3],
                ':DESCRICAO' => $data[4],
                ':PRECO' => $data[5],
            );

            $this->executar($a, 'executarQuery', $var);
        }

        public function search($data)
        {

            $a = 'SELECT codProduto, nome FROM produto WHERE codCategoria = :CODCATEGORIA';

            $var = array(
                ':CODCATEGORIA' => $data[0]
            );
            $this->executar($a, 'executarSelect', $var);
        }

        public function listarProduto(){

            $a = 'SELECT * FROM produto';

            $result = $this->executar($a, 'executarSelect');
            return $result;
        }


        public function select(){

            $a = 'SELECT codProduto, codCategoria, numProduto, nome, descricao, preco FROM produto ORDER BY nome';

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
    }//Fim da Classe