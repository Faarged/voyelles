<?php
  session_start();
  if($_SESSION['statut'] == 'administrateur'){
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Statistiques</title>
    <link rel="stylesheet" href="css/fontawesome-5.9.0/css/all.min.css">
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
    <?php include 'header.php'; ?>
    <div class="corps">
      <?php include 'navadmin.php'; ?>
      <div class="contenu">
        <h1>Statistiques</h1>
        <?php include 'php/fonction_resa.php'; ?>
        <table>
          <caption>Réservations triées par pegi</caption>
          <tr>
            <td>Nombre de réservations en pegi 6:</td>
            <td><?php include 'php/requetes/stat_resa_pegi6.php'; echo $pegi_6; ?></td>
            <td><?php echo $calcul_6."%"; ?></td>
          </tr>
          <tr>
            <td>Nombre de réservations en pegi 9:</td>
            <td><?php include 'php/requetes/stat_resa_pegi9.php'; echo $pegi_9; ?></td>
            <td><?php echo $calcul_9."%"; ?></td>
          </tr>
          <tr>
            <td>Nombre de réservations en pegi 12:</td>
            <td><?php include 'php/requetes/stat_resa_pegi12.php'; echo $pegi_12; ?></td>
            <td><?php echo $calcul_12."%"; ?></td>
          </tr>
          <tr>
            <td>Nombre de réservations en pegi 18:</td>
            <td><?php include 'php/requetes/stat_resa_pegi18.php'; echo $pegi_18; ?></td>
            <td><?php echo $calcul_18."%"; ?></td>
          </tr>
          <tr>
            <td>Nombre total de réservations:</td>
            <td><?php include 'php/requetes/total_resa.php'; echo $total_resa; ?></td>
            <td>100%</td>
          </tr>
        </table>
      </div>
    </div>
    <?php include 'footer.php'; ?>
  </body>
</html>
<?php }else{
  header('Location: index.php');
} ?>
