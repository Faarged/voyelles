<?php
//on inclu la connexion à la base de données
require "../../connex_bdd.php";

//récupère l'id via l'url
$id = $_GET['id'];

//on crée la requete pour supprimer la ligne de la table voulue

$supprime = $bdd->prepare("DELETE FROM materiel WHERE id_materiel = :id");
$supprime->execute(array(
  ':id' => $id
));

//redirection
header("Location: ../../../materiel.php");
?>
