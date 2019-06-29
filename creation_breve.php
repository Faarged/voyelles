<?php
  session_start();
  if ($_SESSION['statut'] == 'administrateur'){
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Création de brève</title>
    <link rel="stylesheet" href="css/fontawesome-5.9.0/css/all.min.css">
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
    <?php include "header.php"; ?>
    <div class="corps">
      <?php include "navadmin.php" ?>
      <div class="contenu">
        <h1>Rédaction de brève</h1>
        <form class="crea_breve" action="php/crea_breve.php" method="post">
          <label for="titre">Titre:</label>
            <input type="text" name="titre" placeholder="Titre">
          <label for="contenu">Contenu:</label>
            <textarea name="contenu" rows="8" cols="60"></textarea>
          <button type="submit" name="submit">Valider</button>
        </form>
      </div>
    </div>
    <?php include "footer.php"; ?>
  </body>
</html>
<?php }else{
  header('Location: index.php');
} ?>
