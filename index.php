<?php
require_once(__DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'connectDb.php');
require_once(__DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'UserController.php');
require_once(__DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'header.php');

$route = isset($_GET['c']) ? $_GET['c'] : 'home';
$id = isset($_GET['id']) ? $_GET['id'] : 0;

switch ($route) {
	case 'home':
		require_once(__DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Controller' . DIRECTORY_SEPARATOR . 'homeController.php');
		break;
	case 'inscription':
		$userController = new UserController();
		$userController->inscription();
	case 'inscrire':
		$userController = new UserController();
		$userController->enregistrer($pdo);
	case 'connexion':
		$userController = new UserController();
		$userController->connexion();
	case 'connecter':
		$userController = new UserController();
		$userController->verify_connection($pdo);
}
