<?php

/*
** Author: Bianca de Oliveira
** Date: 2018-03-18
**
** Define as rotas do sistema, indicando os controllers e métodos responsáveis por ela.
*/

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

//Inicia o autoload automatico das classes
require '..'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

//Inicia o slim
$app = new \Slim\App;

/*
** Inicio da configuração das rotas
*/

//Site
$app->get('/', App\site\Controllers\SiteController::class. ':home');						//Home site
$app->get('/sobre', App\site\Controllers\SiteController::class. ':sobre');					//Página sobre
$app->get('/contato', App\site\Controllers\SiteController::class. ':contato');				//Página contato
$app->get('/cardapio', App\site\Controllers\SiteController::class. ':cardapio');			//Página cardapio
$app->get('/cardapio/{item}', App\site\Controllers\SiteController::class. ':cardapioItem');	//Página item do cardapio

$app->get('/teste', App\system\Controllers\CidadesController::class. ':GetInserir');	//Página teste banco
$app->post('/teste', App\system\Controllers\CidadesController::class. ':PostInserir');	//Página teste banco

//Sistema
$app->get('/app/login', App\system\Controllers\LoginController::class . ':exibirLogin');		//Página de login
$app->post('/app/login', App\system\Controllers\LoginController::class . ':validarLogin');		//Validação de login


$app->run();