<?php
// including the database connection file
require "../../connex_bdd.php";

if(isset($_POST['update']))
{
	$id = $_POST['id'];

	$duree=$_POST['duree'];

	// checking empty fields
	if(empty($duree)){

		if(empty($duree)) {
			echo "<font color='red'>nom field is empty.</font><br/>";
		}
	} else {
		//updating the table
		$sql = "UPDATE reservation SET duree=:duree WHERE id_resa=:id";
		$query = $bdd->prepare($sql);

		$query->bindparam(':id', $id);
		$query->bindparam(':duree', $duree);
		$query->execute();

		// Alternative to above bindparam and execute
		// $query->execute(array(':id' => $id, ':name' => $name, ':email' => $email, ':age' => $age));

		//redirectig to the display page. In our case, it is index.php
		header("Location: ../../../reservations.php");
	}
}
?>
