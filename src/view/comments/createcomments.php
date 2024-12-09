<h1>Ajouter un commentaire</h1>
<form id="formulaire-commentaire">
    <div class="mb-3">
        <label for="contenu" class="form-label">Contenu du commentaire</label>
        <textarea class="form-control" name="contenu" id="contenu" required></textarea>
    </div>
    <div class="mb-3">
        <button type="button" class="btn btn-primary" onclick="ajouterCommentaire(<?php echo $post_id; ?>)">Ajouter un commentaire</button>
    </div>
</form>