<?php
session_start();
include 'accesBDD.php';
$login = $_SESSION["login"];
$sujet = $_SESSION["sujet"];


echo "Veuillez pacientez ..";

//partie envoie du message
if (isset($_POST["nouvMessagePublic"])){
	$nouvMessagePublic = $_POST["nouvMessagePublic"];
	envoieMessagePublic($nouvMessagePublic, $login, $sujet);
 	header('location:MessagePublicPartie2.php');
}
?>
