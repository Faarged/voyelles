<?php
  require "php/connex_bdd.php";
  $reponse = $bdd->prepare("SELECT * FROM users, fait, reservation LIMIT 5");
  $reponse->execute();
?>
