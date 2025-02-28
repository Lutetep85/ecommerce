<?php

namespace gesth\Model;

use \gesth\DB\Banco;
use \gesth\Model;

class User extends Model
{

	const SESSION = "User";

	public static function login($login, $password)
	{

		$banco = new Banco();

		$results = $banco->select("SELECT * FROM tb_users WHERE deslogin = :LOGIN", array(
			":LOGIN"=>$login
		));

		if (count($results) === 0)
		{
			throw new \Exception("Usuário Inexistente ou Senha inválida52.");
		}

		$data = $results[0];

		//echo "Senha digitada: " . $password . "<br>";
    	//echo "Senha armazenada: " . $data["despassword"] . "<br>";

		if ($password === $data["despassword"])
		{
			$user = new User();

			$user->setData($data);

			$_SESSION[User::SESSION] = $user->getValues();

			return $user;
		} 
		else
		{
			throw new \Exception("Usuário Inexistente ou senha inválidaolfogofigjnoi");
		}
	}

	public static function verifyLogin($inadmin = true)
	{
		if(
			!isset($_SESSION[User::SESSION])
			||
			!$_SESSION[User::SESSION]
			||
			!(int)$_SESSION[User::SESSION]["iduser"] > 0
			||
			(bool)$_SESSION[User::SESSION]["inadmin"] !== $inadmin
		) {
			header("Location: /ecommerce/admin/login");
			exit;
		}
	}

	public static function logout()
	{
		$_SESSION[User::SESSION] = NULL;
	}

}

?> 