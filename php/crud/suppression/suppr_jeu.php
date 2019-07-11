<?php
  session_start();
  require "../../connex_bdd.php";
  $id = $_GET['del'];
  $supfait = $bdd->prepare('DELETE FROM disponible WHERE id_jeu = :id');
  $supfait->execute(array('id' => $id));
  $sup = $bdd->prepare('DELETE FROM jeux WHERE id_jeu = :id');
  $sup->execute(array('id' => $id));
  header('Location: ../../../liste_jeux.php');
?>
