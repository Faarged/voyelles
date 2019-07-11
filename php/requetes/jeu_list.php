<?php
  require "php/connex_bdd.php";
  $reponse = $bdd->prepare('SELECT * FROM jeux, materiel, disponible
      WHERE jeux.id_jeu = disponible.id_jeu
      AND materiel.id_materiel = disponible.id_materiel
      ORDER BY pegi_jeu DESC');
  $reponse->execute();
?>
