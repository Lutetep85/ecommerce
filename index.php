<?php

session_start();
require_once("vendor/autoload.php");

use Slim\Factory\AppFactory; // Nova forma de criar a aplicação
use Slim\App; // Classe principal do Slim 4.x
use gesth\Page;
use gesth\PageAdmin;
use gesth\Model\User;



// Cria a aplicação Slim
$app = AppFactory::create();

$basePath = '/ecommerce';

$app->setBasePath($basePath);
// Habilita o modo de depuração
$app->addErrorMiddleware(true, true, true);

// Rota principal
$app->get('/', function ($request, $response, $args) {

    $page = new Page();
    $page->setTpl("index");
    return $response;
});

// Rota para o painel administrativo
$app->get('/admin', function ($request, $response, $args) {

	user::verifyLogin();
    $page = new PageAdmin();
    $page->setTpl("index");
    return $response;
});

// Rota para o login (GET)
$app->get('/admin/login', function ($request, $response, $args) {
    $page = new PageAdmin([
        "header" => false,
        "footer" => false
    ]);
    $page->setTpl("Login");
    return $response;
});

// Rota para o login (POST)
$app->post('/admin/login', function ($request, $response, $args) {
	$login = $_POST['login'] ?? '';
	$password = $_POST['password'] ?? '';

	//var_dump("login:", $login, "senha:", $password);
	//exit();
    User::login($login, $password);
    return $response->withHeader('Location', '/ecommerce/admin')->withStatus(302);
});

$app->map(['GET', 'POST'], '/admin/logout', function($request, $response, $args)
{
    session_destroy();
    //User::logout();

    return $response->withheader('Location', '/ecommerce/admin/login')->withStatus(302);
});



// Executa a aplicação
$app->run();


	
?>