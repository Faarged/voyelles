<?php
  session_start();
  if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
  {
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Mon compte</title>
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
    <?php include "header.php"; ?>
    <div>
      <h1>Mon compte</h1>
      <h2>Données de <?php echo $_SESSION['pseudo'] ?></h2>
    </div>
    <table>
      <?php include 'php/requetes/compte.php';
        while ($donnees = $reponse->fetch()){ ?>
      <tr>
        <td>Nom:</td>
        <td><?php echo $donnees['nom']; ?></td>
      </tr>
      <tr>
        <td>Prenom:</td>
        <td><?php echo $donnees['prenom']; ?></td>
      </tr>
      <tr>
        <td>Date de naissance:</td>
        <td><?php echo $donnees['date_naissance']; ?></td>
      </tr>
      <tr>
        <td>Date d'inscription</td>
        <td><?php echo $donnees['date_inscription']; ?></td>
      </tr>
      <tr>
        <td>Pseudo:</td>
        <td><?php echo $donnees['pseudo']; ?></td>
      </tr>
      <tr>
        <td>Numéro de carte</td>
        <td><?php echo $donnees['carte']; ?></td>
      </tr>
      <tr>
        <td>Mot de passe:</td>
        <td><?php echo $donnees['pass']; ?></td>
      </tr>
      <tr>
        <td>PEGI:</td>
        <td><?php echo $donnees['pegi']; ?></td>
      </tr>
      <tr>
        <td>Statut:</td>
        <td><?php echo $donnees['statut']; ?></td>
      </tr>
      <tr>
        <td>Date de fin d'inscription:</td>
        <td><?php echo $donnees['fin_inscription']; ?></td>
      </tr>
    <?php } ?>
    </table>
    <?php include "footer.php"; ?>
  </body>
</html>
<?php } else {
  header("Location: index.php"); //à la fin de la page après la balise html
 } ?>
