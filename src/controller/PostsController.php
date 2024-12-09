<?php
// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=votre_base_de_donnees', 'votre_utilisateur', 'votre_mot_de_passe');

// Récupération des données du formulaire
$titre = $_POST['titre'];
$contenu = $_POST['contenu'];
$utilisateur_id = $_SESSION['utilisateur_id']; // On suppose que l'utilisateur est connecté et que son ID est stocké dans la session

// Insertion du post dans la base de données
$sql = "INSERT INTO posts (titre, contenu, utilisateur_id, date_publication) VALUES (:titre, :contenu, :utilisateur_id, NOW())";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':titre', $titre);
$stmt->bindParam(':contenu', $contenu);
$stmt->bindParam(':utilisateur_id', $utilisateur_id);
$stmt->execute();

// Redirection vers la page de liste des posts
header('Location: liste_posts.php');
exit;
