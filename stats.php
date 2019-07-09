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
        <p>
          <?php include 'php/requetes/stat_resa_pegi6.php'; ?><br>
          <?php include 'php/requetes/stat_resa_pegi9.php'; ?><br>
          <?php include 'php/requetes/stat_resa_pegi12.php'; ?><br>
          <?php include 'php/requetes/stat_resa_pegi18.php'; ?><br>
        </p>
      </div>
    </div>
    <?php include 'footer.php'; ?>
  </body>
</html>
<?php }else{
  header('Location: index.php');
} ?>
