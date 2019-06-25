<?php
  require "php/connex_bdd.php";
  $reponse = $bdd->prepare("SELECT * FROM users LIMIT 5");
  $reponse->execute();
?>
