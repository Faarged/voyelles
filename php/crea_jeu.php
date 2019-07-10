<?php
  require 'connex_bdd.php';
  $titre = isset($_POST['titre']) ? $_POST['titre'] : NULL;
  $pegi = isset($_POST['pegi_jeu']) ? $_POST['pegi_jeu'] : NULL;

  //insertion du jeu dans la table jeux
  $jeu = $bdd->prepare('INSERT INTO jeux (titre, pegi_jeu)
  VALUES (:titre, :pegi)');
  $jeu->execute(array(
  "titre"=> $titre,
  "pegi"=> $pegi));

  //récupération de l'id du jeu nouvellement crée
  $recup = $bdd->prepare('SELECT id_jeu FROM jeux WHERE titre='.$titre);
  $recup->execute();
  while ($my_game = $recup->fetch()) {
    $id_game = $my_game['id_jeu'];
  }

  foreach($_POST['materiel'] as $value){
    $id = $value;
    $jointure = $bdd->prepare('INSERT INTO disponible(id_jeu, id_materiel)
    VALUES(:jeu, :mat)');
    $jointure->execute(array(
      'jeu' => $id_game,
      'mat' => $id));
  }
  header('Location: ../creation_jeu.php');
 ?>
