<?php
//including the database connection file
include("../config.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$jointure = "DELETE FROM fait WHERE id_user=:id";
$supprime = $dbConn->prepare($jointure);
$supprime->execute(array(':id' => $id));
$sql = "DELETE FROM users WHERE id_user=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));

//redirecting to the display page (index.php in our case)
header("Location: ../../../liste_adherents.php");
?>
