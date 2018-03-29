<?php

namespace App\site\Controllers;

use App\site\Model;

class SiteController
{
	function home($request, $response, $args){
		echo "<h2> Você está home </h2>";
	}

	function sobre($request, $response, $args){
		echo "<h2> Você esta na página sobbre </h2>";
	}

	function contato($request, $response, $args){
		echo "<h2> Você esta na página contato </h2>";
	}

	function cardapio($request, $response, $args){
		echo "<h2> Você esta na página de cardapio </h2>";
	}

	function cardapioItem($request, $response, $args){
		echo "<h2> Você esta em um item do cardapio </h2>" . $args['item'];

	}

}