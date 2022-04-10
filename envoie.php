<?php
session_start();
include 'accesBDD.php';
$login = $_SESSION["login"];
?>
<!doctype html>
<html lang="fr">
<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <title>GSB MESSAGE</title>

</head>
<body style="font-family: 'Montserrat', sans-serif;">

  <nav class="navbar navbar-light bg-light">
    <a href="compte.php" class="navbar-brand">
      <img src="img/logo.png" style="max-width:10%;" class="d-inline-block align-top" alt="" loading="lazy">
      Portail privé
    </a>
  </nav>

<br>







<?php

//Partie verification du nombre de message envoyer
$nbM =  verifNbMessages($login);
var_dump($nbM);


if ($nbM >= 3) {
  echo "<h5 class=text-center> Vous avez deja envoyer 3 messages aujourd'hui</h5>";
} 
else {
  echo"oui";
  //Partie envoie du message
  $utilisateurSelectionner = $_POST["utilisateurSelectionner"];
  $messageEnvoie = $_POST["messageEnvoie"];
  //echo "$utilisateurSelectionner";
  //echo "$messageEnvoie";
  //echo "$login";
  $messageEnvoyer = enoieDeMessage($login, $utilisateurSelectionner, $messageEnvoie);
  //var_dump($messageEnvoyer)
  ajoutNbMessage($login);
  echo "<h5 class=text-center>Votre message à bien été envoyer</h5>";
}
?>
<div class="text-center">
  <br>
  <a href="compte.php" type="button" class="btn btn-outline-info">Retour</a>
</div>


</body>
</html>