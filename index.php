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

  <link rel="stylesheet" type="text/css" href="style.css">
  <title>GSB MESSAGE</title>

</head>
<body style="font-family: 'Montserrat', sans-serif;">
  <br>
  <img style="display: block; margin-left: auto; margin-right: auto; max-width: 200px;" src="img/logo.png">
  <br>
  <h1 class="text-center" style="color: #34495E; text-shadow: 1px 1px 2px #1F618D">Portail privé Visiteurs</h1>


  <br><br>
  <div class="container">
    <div class="shadow-lg p-3 mb-5 bg-white rounded ">
      <br>
      <div class="container">
        <form method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Identifiant</label>
            <input type="text" name="login" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Mots de passe</label>
            <input type="password" name="mdp" class="form-control" id="exampleInputPassword1">
          </div>
          <button type="submit" class="btn btn-outline-dark" style="margin-left: 44%">Connexion</button>
        </form>
        <br>
      </div>
    </div>
  </div>
  
</body>
</html>

<?php 
session_start();
include 'accesBDD.php';
if (isset($_POST["login"])&& isset($_POST["mdp"])){
$login = $_POST["login"];
$mdp = $_POST["mdp"];
$ret = verifLoginMdp($login, $mdp);
if($ret) {
    $_SESSION["login"] = $login; // création de la variable de session
    header('location:compte.php');
    
  }
  else {
    echo "<p class=text-center style=color:red>Nom d'utilisateur ou mot de passe incorrect.</p>";
  }
}
?>
