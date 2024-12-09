<?php
try {
	$host = "localhost";
	$dbname = "ExerciceFinal";
	$user = "root";
	$password = "";

	$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
} catch (Exception $e) {
	die("Erreur : " . $e->getMessage());
}
