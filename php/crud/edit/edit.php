<?php
// including the database connection file
require "../../connex_bdd.php";

if(isset($_POST['update']))
{
	$id = $_POST['id'];

	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$date_naissance=$_POST['date_naissance'];
	$date_inscription=$_POST['date_inscription'];
	$statut=$_POST['statut'];
	$pseudo=$_POST['pseudo'];
	$carte=$_POST['carte'];
	$pegi=$_POST['pegi'];
	$fin_inscription=$_POST['fin_inscription'];

	// checking empty fields
	if(empty($nom) || empty($prenom) || empty($date_naissance) || empty($date_inscription) || empty($statut) || empty($pseudo) || empty($carte) || empty($pegi) || empty($fin_inscription)) {

		if(empty($nom)) {
			echo "<font color='red'>nom field is empty.</font><br/>";
		}

		if(empty($prenom)) {
			echo "<font color='red'>prenom field is empty.</font><br/>";
		}

		if(empty($date_naissance)) {
			echo "<font color='red'>date_naissance field is empty.</font><br/>";
		}

		if(empty($date_inscription)) {
			echo "<font color='red'>date_inscription field is empty.</font><br/>";
		}

		if(empty($statut)) {
			echo "<font color='red'>statut field is empty.</font><br/>";
		}

		if(empty($pseudo)) {
			echo "<font color='red'>pseudo field is empty.</font><br/>";
		}

		if(empty($carte)) {
			echo "<font color='red'>carte field is empty.</font><br/>";
		}

		if(empty($pegi)) {
			echo "<font color='red'>pegi field is empty.</font><br/>";
		}

		if(empty($fin_inscription)) {
			echo "<font color='red'>fin_inscription field is empty.</font><br/>";
		}
	} else {
		//updating the table
		$sql = "UPDATE users SET nom=:nom, prenom=:prenom, date_naissance=:date_naissance, date_inscription=:date_inscription, statut=:statut, pseudo=:pseudo, carte=:carte, pegi=:pegi, fin_inscription=:fin_inscription WHERE id_user=:id";
		$query = $bdd->prepare($sql);

		$query->bindparam(':id', $id);
		$query->bindparam(':nom', $nom);
		$query->bindparam(':prenom', $prenom);
		$query->bindparam(':date_naissance', $date_naissance);
		$query->bindparam(':date_inscription', $date_inscription);
		$query->bindparam(':statut', $statut);
		$query->bindparam(':pseudo', $pseudo);
		$query->bindparam(':carte', $carte);
		$query->bindparam(':pegi', $pegi);
		$query->bindparam(':fin_inscription', $fin_inscription);
		$query->execute();

		// Alternative to above bindparam and execute
		// $query->execute(array(':id' => $id, ':name' => $name, ':email' => $email, ':age' => $age));

		//redirectig to the display page. In our case, it is index.php
		header("Location: ../../../liste_adherents.php");
	}
}
?>
