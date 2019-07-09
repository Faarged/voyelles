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
        <table>
          <tr>
            <td>Nombre de réservations en pegi 6:</td>
            <td><?php include 'php/requetes/stat_resa_pegi6.php'; ?></td>
          </tr>
          <tr>
            <td>Nombre de réservations en pegi 9:</td>
            <td><?php include 'php/requetes/stat_resa_pegi9.php'; ?></td>
          </tr>
          <tr>
            <td>Nombre de réservations en pegi 12:</td>
            <td><?php include 'php/requetes/stat_resa_pegi12.php'; ?></td>
          </tr>
          <tr>
            <td>Nombre de réservations en pegi 18:</td>
            <td><?php include 'php/requetes/stat_resa_pegi18.php'; ?></td>
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
