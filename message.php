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



  <nav class="navbar navbar-light bg-light">
    <a href="compte.php" class="navbar-brand">
      <img src="img/logo.png" style="max-width:10%;" class="d-inline-block align-top" alt="" loading="lazy">
      Portail privé
    </a>
    <a href="compte.php" type="button" class="btn btn-outline-info">Quitter</a>
  </nav>
  <br><br>
  <h4 class="text-center">Envoyer un message privé</h4>
  <br>
  <div class="container shadow-none p-3 mb-5 bg-light rounded">
    <form action="envoie.php" method="POST">
      <div class="container">
        <div class="row">
          <div class="col-sm-4">
            Choisir le destinataire du message :
          </div>
          <div class="col-sm-3">
            <select class="custom-select custom-select-sm" name="utilisateurSelectionner">
                          
                <?php
                $tousLesUtilisateur = getLesDestinataire();
                foreach ($tousLesUtilisateur as $utilisateur){
                  echo "<option>";
                 //var_dump($utilisateur);
                  $user = $utilisateur['login'];
                  echo "$user";
                  echo "</option>";
                }
                ?>
            </select>
          </div>
        </div>
        <label for="exampleFormControlTextarea1">Votre message : </label>
        <textarea class="form-control" name="messageEnvoie" rows="10" placeholder="Bonjour ..."></textarea>
        <br>
        <button type="submit" class="btn btn-primary mb-2">Envoyer</button>
      </div>
    </form>
  </div>



</body>
</html>