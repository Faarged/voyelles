<?php
//connexion à la base de données
require "../../connex_bdd.php";

//Si on clique sur update:
if(isset($_POST['update'])){
  $id = isset($_POST['id']) ? $_POST['id'] : NULL;
  //définition des variables pour l'update
  if(!$_POST['ouverture1']){
    $ouverture = NULL;
  }else{
    $ouverture = $_POST['ouverture1'];
  }
  if(!$_POST['fermeture1']){
    $fermeture = NULL;
  }else{
    $fermeture = $_POST['fermeture1'];
  }

  //la requete pour UPDATE
  $req = $bdd->prepare('UPDATE configuration
    SET ouverture = :ouvert, fermeture = :ferme
    WHERE id_config = :id');
    $req->execute(array(
      'ouvert' => $ouverture,
      'ferme' => $fermeture,
      'id' => $id
    ));
    //une redirection vers la page de configuration
  header('Location: ../../../configuration.php');
}
?>
