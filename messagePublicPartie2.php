<?php
session_start();
include 'accesBDD.php';

$login = $_SESSION["login"];
$sujet = $_SESSION["sujet"];
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
  
  <!-- Rafraichire la partie #partieMessage -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      $('#partieMessage').load("loadMessaagePublic.php");
      setInterval(function(){
          $('#partieMessage').load("loadMessaagePublic.php");
        },10000);//correspond au temps de rafraichissement
    });
  </script> 



  <title>GSB MESSAGE</title>

</head>
<body style="font-family: 'Montserrat', sans-serif; background-color: #5499C7;">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="compte.php">
    <img src="img/logo.png" style="max-width:10%;" class="d-inline-block align-top">
      Portail privé
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="compte.php"> &nbsp;Acceuil &nbsp;</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="message.php"> &nbsp;Envoyer un message privé &nbsp;</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="messagePublicPartie1.php"> &nbsp;Messagerie générale &nbsp;</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#deconnexion" href=""> &nbsp;Déconnexion &nbsp;</a>
      </li>
    </ul>
  </div>
</nav>
<!-- Modal -->
<div class="modal fade" id="deconnexion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Vous nous quittez déjà ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Rester</button>
        <a href="deconnexion.php" type="button" class="btn btn-danger">Déconnexion</a>
      </div>
    </div>
  </div>
</div>
<br><br>
<!-- presentation -->
  <?php
  echo "<h3 class=text-center>Sujet : $sujet</h3>";
  ?>
  <br>

<div class="shadow-none p-3 mb-5 bg-light rounded container">
  <!-- Pour envoyer le message -->
<form method="POST" action="envoieMessagePublic.php">
  <div class=" container">
    <div class="input-group mb-3">
      <input type="text" name="nouvMessagePublic" class="form-control" placeholder="Votre message" aria-label="Recipient's username" aria-describedby="button-addon2">
      <div class="input-group-append">
        <button class="btn btn-outline-dark" name="btnsubmit" type="submit">Envoyer</button>
      </div>
    </div>
  </div>
</form>
<div id=partieMessage>
<!-- Affichage du message grace au scripte java dans <head>-->
</div>
<!-- 
<section id="partieMessage" style="width: 100%; height: 450px; overflow-y: scroll;">
  <?php
  $messagePublic = getMessagePublic($sujet);
  foreach ($messagePublic as $message) {
    $numM = $message["numMessage"];
    $date = $message["dateHeure"];
    $messages = $message["message"];
    $redacteur = $message["loginRedacteur"];
    echo "<div class=container>";
      echo "<div class=card>";
        echo "<div class=card-body>";
          echo "<p><small> Envoyer par $redacteur à $date</small></p>";
          echo "<p>$messages</p>";
        echo "</div>";
      echo "</div>";
    echo "</div>";
    echo "<br>";
  }
  ?>
</section> -->
</div>





</body>
</html>