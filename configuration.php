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
          <div class="titre">
            <h1>Configuration</h1>
          </div>
          <div class="perso">
            <table>
              <caption>Planning</caption>
              <tr>
                <td>Jours:</td>
                <td>Horaires:</td>
                <td>Modification horaires</td>
              </tr>
              <?php include 'php/requetes/horaires.php';
                while ($donnees = $reponse->fetch()){ ?>
              <tr>
                <td><?php echo $donnees['jour']; ?></td>
                <td><?php echo $donnees['ouverture']."-".$donnees['fermeture']; ?></td>
                <td><a href="edit_config.php?id=<?php echo $donnees['id_config']; ?>"><i class="fas fa-cogs"></i></a></td>
              </tr>
              <?php } ?>
            </table>
          </div>
        </div>
        <div class="info">
          <h2>Informations complémentaires</h2>
          <p>
            Pour modifier les horaires et laisser le champs vide, il suffit de
            cliquer sur la croix dans le champs correspondant de la page de
            modifications.<br>
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
