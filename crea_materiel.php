<?php
  session_start();
  if ($_SESSION['statut'] == 'administrateur'){
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Matériel</title>
    <link rel="stylesheet" href="css/fontawesome-5.9.0/css/all.min.css">
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
    <?php include "header.php"; ?>
    <div class="corps">
      <?php include "navadmin.php" ?>
      <div class="contenu">
        <div class="titre">
          <h1>Création de Matériel</h1>
        </div>
        <div class="perso">
          <form class="crea_matos" action="php/crea_materiel.php" method="post">
            <label for="nom">Nom</label>
              <input type="text" name="nom" placeholder="nom du materiel">
            <label for="type1">Type</label>
              <input type="radio" autocomplete="off" name="type1" value="console">
                <p>Console</p>
              <input type="radio" autocomplete="off" name="type1" value="pc">
                <p>Ordinateur</p>
              <input type="radio" autocomplete="off" name="type1" value="accessoire">
                <p>Accessoire</p>
            <button type="submit" name="submit">Créer</button>
          </form>
        </div>
      </div>
    </div>
    <?php include "footer.php"; ?>
  </body>
</html>
<?php }else{
  header('Location: index.php');
} ?>
