$.ajax({
    type: 'POST',
    url: 'commentaire.php',
    data: {
        post_id: post_id,
        contenu: contenu
    },
    success: function (reponse) {
        // Afficher le message de confirmation
        alert(reponse);
    }
});