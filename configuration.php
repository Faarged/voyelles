<?php
session_start();
if ($_SESSION['statut'] == 'administrateur'){
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuration</title>
    <link rel="stylesheet" href="css/fontawesome-5.9.0/css/all.min.css">
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
    <?php include 'header.php'; ?>
    <div class="corps">
      <?php include 'navadmin.php'; ?>
      <div class="contenu">
        <div>
          <h1>Configuration</h1>
          <table>
            <caption>Planning</caption>
            <tr>
              <td>Jours:</td>
              <td>Lundi</td>
              <td>Mardi</td>
              <td>Mercredi</td>
              <td>Jeudi</td>
              <td>Vendredi</td>
              <td>Samedi</td>
              <td>Dimanche</td>
            </tr>
            <tr>
              <td>Ouverture:</td>
              <td>Fermeture</td>
              <td>13H00-18H00</td>
              <td>10H00-18H00</td>
              <td>13H00-18H00</td>
              <td>13H00-18H00</td>
              <td>10H00-18H00</td>
              <td>Fermeture</td>
            </tr>
          </table>
        </div>
        <div class="info_complementaires">
          <h2>Informations complémentaires</h2>
          <p>
            Les réservations effectuées ont une durée minimale de 15min
            afin d'éviter les abus de changement de matériel.<br>
            Vous pouvez modifier les données de chaque compte, y compris
            celles de vos collègues, veillez donc à ne le faire qu'en cas de nécessité.<br>
            Vous pouvez également modifier les données de réservation au cas ou un
            utilisateur quitte son poste avant la fin de la durée demandée.
          </p>
        </div>
      </div>
    </div>
    <?php include 'footer.php'; ?>
  </body>
</html>
<?php } else {
  header("Location: index.php");
 } ?>