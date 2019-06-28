<?php session_start();
  if ($_SESSION['statut'] == 'administrateur'){
?>

<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
$result = $dbConn->query('SELECT * FROM users WHERE statut = "adherent"');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Liste des adhérents</title>
  <link rel="stylesheet" href="../../../css/fontawesome-5.9.0/css/all.min.css">
  <link rel="stylesheet" href="../../../css/main.css">
</head>

<body>
  <?php include "../../../header.php"; ?>
  <div class="liste_adherents">
    <h1>Liste des adhérents</h1>




    <a href="add.html">Add New Data</a><br /><br />

    <table width='80%' border=0>

      <tr bgcolor='#CCCCCC'>
        <td>nom</td>
        <td>prenom</td>
        <td>date_naissance</td>
        <td>date_inscription</td>
        <td>pseudo</td>
        <td>carte</td>
        <td>pegi</td>
        <td>fin_inscription</td>
        <td>Update</td>
      </tr>
      <?php
            	while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            		echo "<tr>";
            		echo "<td>".$row['nom']."</td>";
            		echo "<td>".$row['prenom']."</td>";
            		echo "<td>".$row['date_naissance']."</td>";
            		echo "<td>".$row['date_inscription']."</td>";
            		echo "<td>".$row['pseudo']."</td>";
            		echo "<td>".$row['carte']."</td>";
            		echo "<td>".$row['pegi']."</td>";
            		echo "<td>".$row['fin_inscription']."</td>";
            		echo "<td><a href=\"edit.php?id=$row[id_user]\">Edit</a> | <a href=\"delete.php?id=$row[id_user]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
            	}
            	?>
    </table>
  </div>
  <?php include "../../../footer.php"; ?>
</body>

</html>
<?php }else{
        header('Location: index.php');
      } ?>
