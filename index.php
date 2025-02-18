<?php

	require_once("vendor/autoload.php");

	$app = new \Slim\Slim();

	$app->config('debug', true);

	$app->get('/', function()
	{
		$sql = new gesth\DB\Banco();

        $results = $sql->select("SELECT * FROM tb_Users");

        echo json_encode($results);
	});

	$app->run();
?>