<?php
  require 'connex_bdd.php';
  $reponse = $bdd->prepare("SELECT * FROM user")
  $reponse->execute();
  while ($donnees = $reponse->fetch())
 {
?>
