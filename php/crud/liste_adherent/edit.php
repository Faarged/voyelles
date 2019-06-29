<?php echo 'coucou';
// including the database connection file
include("../config.php");

if(isset($_POST['update']))
{
	$id = $_POST['id'];

	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$date_naissance=$_POST['date_naissance'];
	$date_inscription=$_POST['date_inscription'];
	$pseudo=$_POST['pseudo'];
	$carte=$_POST['carte'];
	$pegi=$_POST['pegi'];
	$fin_inscription=$_POST['fin_inscription'];

	// checking empty fields
	if(empty($nom) || empty($prenom) || empty($date_naissance) || empty($date_inscription) || empty($pseudo) || empty($carte) || empty($pegi) || empty($fin_inscription)) {

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
			echo "<font color='red'>fin_inscription field is empty.</font><br/>";
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
		$sql = "UPDATE users SET nom=:nom, prenom=:prenom, date_naissance=:date_naissance date_inscription=:date_inscription, pseudo=:pseudo, carte=:carte, pegi=:pegi, fin_inscription=:fin_inscription WHERE id_user=:id";
		$query = $dbConn->prepare($sql);

		$query->bindparam(':id', $id);
		$query->bindparam(':nom', $nom);
		$query->bindparam(':prenom', $prenom);
		$query->bindparam(':date_naissance', $date_naissance);
		$query->bindparam(':date_inscription', $date_inscription);
		$query->bindparam(':pseudo', $pseudo);
		$query->bindparam(':carte', $carte);
		$query->bindparam(':pegi', $pegi);
		$query->bindparam(':fin_inscription', $fin_inscription);
		$query->execute();


		header("Location: liste_adherents.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$sql = "SELECT * FROM users WHERE id_user=:id";
$query = $dbConn->prepare($sql);
$query->execute(array('id' => $id));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	$nom = $row['nom'];
	$prenom = $row['prenom'];
	$date_naissance = $row['date_naissance'];
	$date_inscription = $row['date_inscription'];
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
	<br /><br />

	<form name="form1" method="post" action="edit.php?id=<?php echo $_GET["id"];?>">
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
				<td><input type="text" name="date_naissance" value="<?php echo $date_naissance;?>"></td>
			</tr>
			<td>date_inscription</td>
			<td><input type="text" name="date_inscription" value="<?php echo $date_inscription;?>"></td>
			</tr>
			<tr>
				<td>pseudo</td>
				<td><input type="text" name="pseudo" value="<?php echo $pseudo;?>"></td>
			</tr>
			<tr>
				<td>carte</td>
				<td><input type="text" name="carte" value="<?php echo $carte;?>"></td>
			</tr>
			<td>pegi</td>
			<td><input type="text" name="pegi" value="<?php echo $pegi;?>"></td>
			</tr>
			<tr>
				<td>fin_inscription</td>
				<td><input type="text" name="fin_inscription" value="<?php echo $fin_inscription;?>"></td>
			</tr>
			<tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>

</html>
