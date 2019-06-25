<?php
  require '../connex_bdd.php';
  $reponse = $bdd->prepare("SELECT * FROM breves ORDER BY id_breves DESC LIMIT 1");
  $reponse->execute();
  while ($donnees = $reponse->fetch()){
?>
