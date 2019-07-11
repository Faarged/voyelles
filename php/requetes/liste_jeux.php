<?php
  require "php/connex_bdd.php";
  require 'compte.php';
  while ($donnees = $reponse->fetch()){
    $pegi_user = $donnees['pegi'];
  }
  $reponse = $bdd->prepare("SELECT * FROM jeux, materiel, disponible
      WHERE jeux.id_jeu = disponible.id_jeu
      AND materiel.id_materiel = disponible.id_materiel
      AND jeux.pegi_jeu >= :pegi
      ORDER BY jeux.pegi_jeu");
      $reponse->execute(array(
        'pegi' => $pegi_user
      ));
?>
