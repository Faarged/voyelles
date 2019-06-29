<?php
  require "connex_bdd.php";
  $nom = isset($_POST['nom']) ? $_POST['nom'] : NULL;
  $type = isset($_POST['type1']) ? $_POST['type1'] : NULL;

  $req = $bdd->prepare('INSERT INTO materiel(nom_materiel, type)
    VALUES(:nom, :type)');
  $req->execute(array(
    'nom' => $nom,
    'type' => $type
  ));
  header('Location: ../materiel.php');
?>
