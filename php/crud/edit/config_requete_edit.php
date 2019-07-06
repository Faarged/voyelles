<?php
$id = $_GET['id'];
$sql = "SELECT * FROM configuration WHERE id_config=:id";
$query = $bdd->prepare($sql);
$query->execute(array(':id' => $id));
while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	$ouverture = $row['ouverture'];
  $fermeture = $row['fermeture'];
}
?>
