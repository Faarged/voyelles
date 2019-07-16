<?php
//connexion à la base de données
require "../../connex_bdd.php";

//on récupère l'id avec un get
$id = $_GET['id'];

/*on efface la ligne des tables de jointure
en premier puis de la table principale*/
$jointure = "DELETE FROM fait WHERE id_user=:id";
$supprime = $bdd->prepare($jointure);
$supprime->execute(array(':id' => $id));
$sql = "DELETE FROM users WHERE id_user=:id";
$query = $bdd->prepare($sql);
$query->execute(array(':id' => $id));

//redirection après traitement
header("Location: ../../../accueil.php");
?>
