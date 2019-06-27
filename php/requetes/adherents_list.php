<?php
  require "php/connex_bdd.php";
  $reponse = $bdd->prepare('SELECT * FROM users WHERE statut = "adherent"');
  $reponse->execute();
?>
