<?php
session_start();
include 'accesBDD.php';

$login = $_SESSION["login"];
$sujet = $_SESSION["sujet"];
?>

<!-- Affichage du message -->
<section style="width: 100%; height: 450px; overflow-y: scroll;">
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
</section>
