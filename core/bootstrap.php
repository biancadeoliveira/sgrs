<?php

//ARQUIVO DE INICIALIZAÇÃO DA APLICAÇÃO
$routers = require_once (__DIR__  . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR . "routers.php");

$route = new \Core\Route($routers);