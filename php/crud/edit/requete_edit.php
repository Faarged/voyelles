<?php
$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id_user=:id";
$query = $bdd->prepare($sql);
$query->execute(array(':id' => $id));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	$nom = $row['nom'];
	$prenom = $row['prenom'];
	$date_naissance = $row['date_naissance'];
	$date_inscription = $row['date_inscription'];
	$statut = $row['statut'];
	$pseudo = $row['pseudo'];
	$carte = $row['carte'];
	$pegi = $row['pegi'];
	$fin_inscription = $row['fin_inscription'];
	$temps = $row['temps'];
}
?>
