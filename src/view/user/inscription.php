<h1>Inscription</h1>
<form action="?c=inscrire" method="post">
	<div>
		<label for="name">Nom</label>
		<input type="text" name="name" id="name" required>
	</div>
	<div>
		<label for="email">Adresse email</label>
		<input type="email" name="email" id="email" required>
	</div>
	<div>
		<label for="password" class="form-label">Mot de passe</label>
		<input type="password" name="password" id="password" required>
	</div>
	<div>
		<button type="submit" id="enregistrer">S'inscrire</button>
	</div>
</form>