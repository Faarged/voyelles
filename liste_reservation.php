<?php
session_start();
if ($_SESSION['statut'] == 'administrateur')
{
?>
<?php include "php/requetes/liste_resa.php"?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Réservations</title>
    <link rel="stylesheet" href="css/fontawesome-5.9.0/css/all.min.css">
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
    <?php include "header.php"; ?>
      <div class="contenu">
        <h1>Liste réservations</h1>
        <table>
          <tr>
            <td>Utilisateur</td>
            <td>Carte</td>
            <td>Pegi</td>
            <td>Date de réservation</td>
            <td>Heure de début</td>
            <td>Temps de réservation</td>
            <td>Matériel réservé</td>
          </tr>
          <?php while ($donnees = $reponse->fetch()){ ?>
          <tr>
            <td><?php echo $donnees['nom']." ".$donnees['prenom']; ?></td>
            <td><?php echo $donnees['carte']; ?></td>
            <td><?php echo $donnees['pegi']; ?></td>
            <td><?php echo $donnees['date_resa']; ?></td>
            <td><?php echo $donnees['debut_resa']; ?></td>
            <td><?php echo $donnees['duree'] ?></td>
            <td><?php echo $donnees['materiel_res'] ?></td>
          </tr>
          <?php } ?>
        </table>
      </div>
    <?php include "footer.php"; ?>
  </body>
</html>
<?php }else{
  header("Location: index.php");
  } ?>
