<?php
session_start();
if ($_SESSION['statut'] == 'adherent')
{
?>
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
        <h1>Mes réservations</h1>
        <table>
          <tr>
            <td>Date de réservation</td>
            <td>Heure de début</td>
            <td>Temps de réservation</td>
            <td>Matériel réservé</td>
          </tr>
          <?php include "php/requetes/resa.php";
          while ($donnees = $reponse->fetch()){ ?>
          <tr>
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
<?php }elseif ($_SESSION['statut'] == 'administrateur') { ?>
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
      <div class="corps">
        <?php include "navadmin.php" ?>
        <div class="contenu">
          <h1>Création de réservations</h1>
          <form class="" action="php/crea_reserv.php" method="post">
            <label for="carte">Numéro de carte</label>
              <input type="text" name="carte1" placeholder="numéro de carte">
            <label for="date_resa1">Date de réservation</label>
              <input type="date" name="date_resa1" value="<?php echo date('Y-m-d'); ?>">
            <label for="debut_resa1">Début de la réservation</label>
              <input type="time" name="debut_resa1" min='10:00' max='17:45' step='900' value="<?php echo date('H:i'); ?>">
            <label for="duree1">Temps de réservation</label>
              <input type="time" name="duree1" step='900'>
            <label for="materiel1">Matériel réservé</label>
              <input type="text" name="materiel1" placeholder="Matériel">
            <button type="submit" name="submit" class="valider" value="envoyer">Valider</button>
          </form>
          <table>
            <tr>
              <td>Utilisateur</td>
              <td>Date de réservation</td>
              <td>Heure de début</td>
              <td>Temps de réservation</td>
              <td>Matériel réservé</td>
              <td>Edition de la durée</td>
            </tr>
            <?php include "php/requetes/resa_journalieres.php";
            while ($donnees = $reponse->fetch()){ ?>
            <tr>
              <td><?php echo $donnees['nom']." ".$donnees['prenom']; ?></td>
              <td><?php echo $donnees['date_resa']; ?></td>
              <td><?php echo $donnees['debut_resa']; ?></td>
              <td><?php echo $donnees['duree'] ?></td>
              <td><?php echo $donnees['materiel_res'] ?></td>
              <td><a href="edit_reserv.php?id=<?php echo $donnees['id_resa']; ?>"><i class="fas fa-cogs"></i></a></td>
            </tr>
            <?php } ?>
          </table>
        </div>
      </div>
      <?php include "footer.php"; ?>
    </body>
  </html>
<?php }else{
  header("Location: index.php");
  } ?>
