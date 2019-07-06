<?php
require "../../connex_bdd.php";

if(isset($_POST['update'])){
  $id = isset($_POST['id']) ? $_POST['id'] : NULL;
  if(empty($_POST['ouverture1'])){
    $ouverture = NULL;
  }else{
    $ouverture = isset($_POST['ouverture1']);
  }
  if(empty($_POST['fermeture1'])){
    $fermeture = NULL;
  }else{
    $fermeture = isset($_POST['fermeture1']);
  }
  $req = $bdd->prepare('UPDATE configuration
    SET ouverture = :ouvert, fermeture = :ferme
    WHERE id_config = :id');
    $req->execute(array(
      'ouvert' => $ouverture,
      'ferme' => $fermeture,
      'id' => $id
    ));
  header('Location: ../../../configuration.php');
}
?>
