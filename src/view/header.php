<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Exercice Final</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
		crossorigin="anonymous"></script>
	// Pas la bonne destination 100% sûr
	<script src="script.js"></script>
</head>

<body>
	<nav class="navbar navbar-expand-lg bg-body-tertiary">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="?c=home">Accueil</a>
			</li>
		</ul>
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="btn btn-outline-dark" href="?c=inscription">Inscription</a>
			</li>
			<li class="nav-item">
				<a class="btn btn-outline-dark" href="?c=connexion">Connexion</a>
			</li>
			<?php
			if (isset($_SESSION['id'])) { ?>
				<li class="nav-item">
					<a class="btn btn-outline-dark" href="?c=post">Création de posts</a>
				</li>
			<?php
			}
			?>



		</ul>
	</nav>
	<div class="container w-75 m-auto">