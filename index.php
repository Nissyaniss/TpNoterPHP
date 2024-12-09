<?php
require_once(__DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'connectDB.php');
require_once(__DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'UserController.php');
require_once(__DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'header.php');

$route = isset($_GET['c']) ? $_GET['c'] : 'home';
$id = isset($_GET['id']) ? $_GET['id'] : 0;

switch ($route) {
	case 'home':
		require_once(__DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'HomeController.php');
		break;

	case 'inscription':
		$userController = new UserController();
		$userController->inscription();
		break;

	case 'inscrire':
		$userController = new UserController();
		$userController->enregistrer($pdo);
		break;

	case 'connexion':
		$userController = new UserController();
		$userController->connexion();
		break;

	case 'connecter':
		$userController = new UserController();
		$userController->verify_connection($pdo);
		break;

	case 'post':
		require_once(__DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'PostsController.php');
		break;

	default:
		echo "Erreur : route non définie.";
		break;
}
