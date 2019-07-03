<?php
$id = $_GET['id'];
$sql = "SELECT * FROM reservation WHERE id_resa=:id";
$query = $bdd->prepare($sql);
$query->execute(array(':id' => $id));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	$duree = $row['duree'];
}
?>
