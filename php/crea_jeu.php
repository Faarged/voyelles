<?php
require 'connex_bdd.php';
  $titre = isset($_POST['titre']) ? $_POST['titre'] : NULL;
    $titre = isset($_POST['pegi_jeu']) ? $_POST['pegi_jeu'] : NULL;
//REQUETTE SUPPORT A FAIRE
  $jeu = $bdd->prepare('INSERT INTO jeux (titre, pegi_jeu) VALUES (:titre, :pegi)');
  $jeu->execute(array(

  "titre"=> $titre
  "pegi"=> $pegi));

  $reponse = $bdd->prepare('SELECT id_jeu FROM jeu WHERE titre:'.$titre);
  $recup->execute();

 ?>
