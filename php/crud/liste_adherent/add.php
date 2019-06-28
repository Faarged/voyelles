<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$date_naissance = $_POST['date_naissance'];

	// checking empty fields
	if(empty($nom) || empty($prenom) || empty($date_naissance)) {

		if(empty($nom)) {
			echo "<font color='red'>nom field is empty.</font><br/>";
		}

		if(empty($prenom)) {
			echo "<font color='red'>prenom field is empty.</font><br/>";
		}

		if(empty($date_naissance)) {
			echo "<font color='red'>date_naissance field is empty.</font><br/>";
		}

		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else {
		// if all the fields are filled (not empty)

		//insert data to database
		$sql = "INSERT INTO users(nom, prenom, date_naissance) VALUES(:nom, :prenom, :date_naissance)";
		$query = $dbConn->prepare($sql);

		$query->bindparam(':nom', $nom);
		$query->bindparam(':prenom', $prenom);
		$query->bindparam(':date_naissance', $date_naissance);
		$query->execute();

		// Alternative to above bindparam and execute
		// $query->execute(array(':nom' => nom, ':email' => $email, ':age' => $age));

		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
