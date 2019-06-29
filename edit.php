<?php
session_start();
require "php/connex_bdd.php";
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
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
}
?>
<html>
<head>
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>

	<form name="form1" method="post" action="php/crud/edit/edit.php">
		<table border="0">
			<tr>
				<td>nom</td>
				<td><input type="text" name="nom" value="<?php echo $nom;?>"></td>
			</tr>
			<tr>
				<td>prenom</td>
				<td><input type="text" name="prenom" value="<?php echo $prenom;?>"></td>
			</tr>
			<tr>
				<td>date_naissance</td>
				<td><input type="date" name="date_naissance" value="<?php echo $date_naissance;?>"></td>
			</tr>
			<tr>
				<td>date_inscription</td>
				<td><input type="date" name="date_inscription" value="<?php echo $date_inscription;?>"></td>
			</tr>
			<tr>
				<td>statut</td>
				<td><input type="text" name="statut" value="<?php echo $statut;?>"></td>
			</tr>
			<tr>
				<td>pseudo</td>
				<td><input type="text" name="pseudo" value="<?php echo $pseudo;?>"></td>
			</tr>
			<tr>
				<td>carte</td>
				<td><input type="text" name="carte" value="<?php echo $carte;?>"></td>
			</tr>
			<tr>
				<td>pegi</td>
				<td><input type="text" name="pegi" value="<?php echo $pegi;?>"></td>
			</tr>
			<tr>
				<td>fin_inscription</td>
				<td><input type="text" name="fin_inscription" value="<?php echo $fin_inscription;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
