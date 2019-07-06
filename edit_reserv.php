<?php
session_start();
if ($_SESSION['statut'] == 'administrateur'){
require "php/connex_bdd.php";
require "php/crud/edit/reserv_requete_edit.php";
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
			<p><a href="accueil.php">Accueil</a></p>
			<br/><br/>
			<form name="form1" method="post" action="php/crud/edit/reserv_edit.php">
				<table border="0">
					<tr>
						<td>duree</td>
						<td><input type="time" name="duree" value="<?php echo $duree;?>"></td>
					</tr>
					<tr>
						<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
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
