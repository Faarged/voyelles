<?php
session_start();
if ($_SESSION['statut'] == 'administrateur'){
require "php/connex_bdd.php";
require "php/crud/edit/requete_edit.php";
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edition de compte</title>
	<link rel="stylesheet" href="css/fontawesome-5.9.0/css/all.min.css">
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<?php include 'header.php'; ?>
	<div class="corps">
		<?php include 'navadmin.php'; ?>
		<div class="contenu">
			<h1>Edition de compte</h1>
			<br/><br/>
			<form name="form1" method="post" action="php/crud/edit/edit.php">
				<table border="0">
					<caption>Edition de compte</caption>
					<tr>
						<td>Nom</td>
						<td><input type="text" name="nom" value="<?php echo $nom;?>"></td>
					</tr>
					<tr>
						<td>Prenom</td>
						<td><input type="text" name="prenom" value="<?php echo $prenom;?>"></td>
					</tr>
					<tr>
						<td>Date d'inscription</td>
						<td><input type="date" name="date_inscription" value="<?php echo $date_inscription;?>"></td>
					</tr>
					<tr>
						<td>Pseudo</td>
						<td><input type="text" name="pseudo" value="<?php echo $pseudo;?>"></td>
					</tr>
					<tr>
						<td>Carte</td>
						<td><input type="text" name="carte" value="<?php echo $carte;?>"></td>
					</tr>
					<tr>
						<td>Pegi</td>
						<td><input type="text" name="pegi" value="<?php echo $pegi;?>"></td>
					</tr>
					<tr>
						<td>Date fin d'inscription</td>
						<td><input type="text" name="fin_inscription" value="<?php echo $fin_inscription;?>"></td>
					</tr>
					<tr>
						<td>Temps maximum autorisé</td>
						<td><input type="time" min="01:00" max="02:00" step="3600" name="temps" value="<?php echo $temps;?>"></td>
					</tr>
					<tr>
						<td> <input type="hidden" name="statut" value="<?php echo $statut; ?>"> </td>
						<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
					</tr>
					<tr>
						<td><input type="submit" name="update" value="Mettre à jour"></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
<?php }else{
  header('Location: index.php');
}
?>
