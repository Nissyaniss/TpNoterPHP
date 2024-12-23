<?php

class UserController
{
	function inscription()
	{
		require_once __DIR__ . DIRECTORY_SEPARATOR . '..' .
			DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'user' .
			DIRECTORY_SEPARATOR . 'inscription.php';
	}

	function connexion()
	{
		require_once __DIR__ . DIRECTORY_SEPARATOR . '..' .
			DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'user' .
			DIRECTORY_SEPARATOR . 'connexion.php';
	}

	function enregistrer($pdo)
	{
		$nom = $_POST['nom'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		/** @var PDO $pdo **/

		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

		$requete = $pdo->prepare('INSERT INTO users (nom, email, password, date_inscription) VALUES (:nom, :email, :password, NOW())');
		$requete->bindParam(':nom', $nom);
		$requete->bindParam(':email', $email);
		$requete->bindParam(':password', $hashedPassword);

		$ajoutOk = $requete->execute();

		if ($ajoutOk) {
			require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'user' . DIRECTORY_SEPARATOR . 'incription_reussite.php');
			require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'user' . DIRECTORY_SEPARATOR . 'connexion.php');
		} else {
			require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'user' . DIRECTORY_SEPARATOR . 'error_inscription.php');
		}
	}

	function verify_connection($pdo)
	{
		$nom = $_POST['nom'];
		$password = $_POST['password'];

		$requete = $pdo->prepare('SELECT * FROM users WHERE nom = :nom');

		$requete->bindParam(':nom', $nom);

		$requete->execute();

		$user = $requete->fetch();

		if ($user && password_verify($password, $user['password'])) {
			session_start();
			$_SESSION['id'] = $user['id'];
			$_SESSION['nom'] = $user['nom'];
			require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'home.php');
		} else {
			require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'user' . DIRECTORY_SEPARATOR . 'error_connection.php');
		}
	}
}
