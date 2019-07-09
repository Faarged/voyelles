<?php

require "../../connex_bdd.php";

if(isset($_POST['update']))
{
	$id = $_POST['id'];
	$statut = $_POST['statut'];
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$date_inscription=$_POST['date_inscription'];
	$pseudo=$_POST['pseudo'];
	$carte=$_POST['carte'];
	$pegi=$_POST['pegi'];
	$fin_inscription=$_POST['fin_inscription'];
	if(!$_POST['temps']){
	  $temps = NULL;
	}else{
	  $temps = $_POST['temps'];
	}
	// vérifie les champs vides
	if(empty($nom) || empty($prenom) ||  empty($date_inscription) || empty($pseudo) || empty($carte) || empty($pegi) || empty($fin_inscription)) {

		if(empty($nom)) {
			echo "<font color='red'>nom field is empty.</font><br/>";
		}

		if(empty($prenom)) {
			echo "<font color='red'>prenom field is empty.</font><br/>";
		}

		if(empty($date_inscription)) {
			echo "<font color='red'>date_inscription field is empty.</font><br/>";
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
		//requete sql
		$sql = "UPDATE users SET nom=:nom, prenom=:prenom, date_inscription=:date_inscription, pseudo=:pseudo, carte=:carte, pegi=:pegi, fin_inscription=:fin_inscription, temps=:temps WHERE id_user=:id";
		$query = $bdd->prepare($sql);

		$query->bindparam(':id', $id);
		$query->bindparam(':nom', $nom);
		$query->bindparam(':prenom', $prenom);
		$query->bindparam(':date_inscription', $date_inscription);
		$query->bindparam(':pseudo', $pseudo);
		$query->bindparam(':carte', $carte);
		$query->bindparam(':pegi', $pegi);
		$query->bindparam(':fin_inscription', $fin_inscription);
		$query->bindparam(':temps', $temps);
		$query->execute();

		if($statut == 'adherent'){
			header("Location: ../../../liste_adherents.php");
		}elseif ($statut == 'administrateur'){
			header('Location: ../../../liste_admin.php');
		}else{
			header('Location: ../../../index.php');
		}


	}
}
?>
