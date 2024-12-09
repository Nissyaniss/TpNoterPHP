<?php

class UserController
{
	// Fonction permettant d'ajouter une nouvelle recette
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

		$requete = $pdo->prepare('INSERT INTO users (nom, email, password, create_time) VALUES (:nom, :email, :password, NOW())');
		$requete->bindParam(':nom', $nom);
		$requete->bindParam(':email', $email);
		$requete->bindParam(':password', password_hash($password, PASSWORD_DEFAULT));

		// exécution de la requête
		$ajoutOk = $requete->execute();

		if ($ajoutOk) {
			// redirection vers la vue d'enregistrement effectué
			require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . 'User' . DIRECTORY_SEPARATOR . 'enregistrement.php');
		} else {
			echo 'Erreur lors de l\'enregistrement de la recette';
		}
	}

	function verify_connection($pdo)
	{
		$identifiant = $_POST['identifiant'];
		$pwd = $_POST['pwd'];

		$requete = $pdo->prepare('SELECT * FROM users WHERE identifiant = :identifiant');

		$requete->bindParam(':identifiant', $identifiant);

		$requete->execute();

		$user = $requete->fetch();

		if ($user && password_verify($pwd, $user['password'])) {
			require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . 'home.php');
		} else {
			require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . 'User' . DIRECTORY_SEPARATOR . 'error.php');
		}
	}
}
