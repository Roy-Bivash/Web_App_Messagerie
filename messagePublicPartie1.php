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
<br><br><br>


<!-- Selectionner le sujet -->
<div class="container text-center">
  <h4>Selectionner le sujet de discussion</h4><br>
  <form method="POST">
   <select class="custom-select custom-select-sm" name="leSujet" style="width: 15em">
    <option>Selectionner</option>
      <?php
      $tousLesSujets = getLesSujets();
      foreach ($tousLesSujets as $sujet){
        echo "<option>";
                //var_dump($sujet);
        $lesSujets = $sujet['sujet'];
        echo "$lesSujets";
        echo "</option>";
      }
      ?>
    </select>
    <button type="submit" class="btn btn-outline-dark">Valider</button>
  </form>
</div>

<?php
if (isset($_POST["leSujet"])){
$sujet = $_POST["leSujet"];
if($sujet != "Selectionner") {
  $_SESSION["sujet"] = $sujet;
    header('location:messagePublicPartie2.php');
  }
  else {
    echo "<p class=text-center style=color:#A93226>Veuillez choisir un sujet de discussion pour continuer</p>";
  }
}
?>




</body>
</html>