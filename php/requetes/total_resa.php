<?php
  require 'php/connex_bdd.php';
  $compte = $bdd->prepare('SELECT COUNT(*) AS total_resa FROM fait');
  $compte->execute();
  while ($donnees = $compte->fetch()){
    $total_resa = $donnees['total_resa'];
  }
?>
