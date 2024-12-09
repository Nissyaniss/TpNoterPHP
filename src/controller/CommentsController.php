<?php

class CommentsController
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function ajouter_commentaire()
    {
        // Vérifier si les données nécessaires sont présentes
        if (isset($_POST['post_id'], $_POST['contenu']) && !empty($_POST['contenu'])) {
            session_start();
            $post_id = $_POST['post_id'];
            $contenu = htmlspecialchars($_POST['contenu']);
            $utilisateur_id = $_SESSION['user_id'];

            // Ajouter le commentaire dans la base de données
            $requete = $this->pdo->prepare(
                'INSERT INTO comments (contenu, utilisateur_id, post_id, date_commentaire)
                 VALUES (:contenu, :utilisateur_id, :post_id, NOW())'
            );
            $requete->bindParam(':contenu', $contenu);
            $requete->bindParam(':utilisateur_id', $utilisateur_id);
            $requete->bindParam(':post_id', $post_id);

            if ($requete->execute()) {
                echo json_encode(['status' => 'success', 'message' => 'Commentaire ajouté avec succès !']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Erreur lors de l\'ajout du commentaire.']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Données invalides.']);
        }
    }
}
