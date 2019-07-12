<?php
  require "php/connex_bdd.php";
  $reponse = $bdd->prepare('SELECT * FROM jeux
      ORDER BY pegi_jeu DESC');
  $reponse->execute();
?>
