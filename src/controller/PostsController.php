<?php


class PostsController
{
	function publier_post()
	{

		$titre = $_POST['titre'];
		$contenu = $_POST['contenu'];
		$utilisateur_id = $_SESSION['utilisateur_id'];

		/** @var PDO $pdo **/

		$sql = "INSERT INTO posts (titre, contenu, utilisateur_id, date_publication) VALUES (:titre, :contenu, :utilisateur_id, NOW())";
		$stmt = $pdo->prepare($sql);
		$stmt->bindParam(':titre', $titre);
		$stmt->bindParam(':contenu', $contenu);
		$stmt->bindParam(':utilisateur_id', $utilisateur_id);
		$stmt->execute();

		// header('Location: liste_posts.php');
		exit;
	}

	function lister($pdo)
	{
		$requete = $pdo->prepare("SELECT * FROM RECETTES");

		$requete->execute();
		$posts = $requete->fetchAll(PDO::FETCH_ASSOC);

		require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'posts' . DIRECTORY_SEPARATOR . 'liste.php');
	}
}
