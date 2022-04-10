<?php
session_start();
include 'accesBDD.php';
	echo "Déconnexion en cours...";
	$login = "0";
	$mdp = "0";
	$utilisateurSelectionner = "0";
	$messageEnvoie = "0";
	$messageEnvoyer = "0";
	session_destroy();
	header('location:index.php');
?>