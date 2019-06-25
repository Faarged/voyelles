<?php
  require '../connex_bdd.php';
  $reponse = $bdd->prepare("SELECT * FROM user LIMIT 5");
  $reponse->execute();
  while ($donnees = $reponse->fetch())
 {
?>
