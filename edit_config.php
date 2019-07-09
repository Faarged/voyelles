<?php
  session_start();
  if ($_SESSION['statut'] == 'administrateur'){
    require "php/connex_bdd.php";
    require "php/crud/edit/config_requete_edit.php";
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edition horaires</title>
    <link rel="stylesheet" href="css/fontawesome-5.9.0/css/all.min.css">
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
    <?php include 'header.php'; ?>
    <div class="corps">
      <?php include 'navadmin.php'; ?>
      <div class="contenu">
        <div class="titre">
          <h1>Changement des horaires</h1>
        </div>
        <div class="perso">
          <form method="post" action="php/crud/edit/config_edit.php">
    				<label for="ouverture1">Horaire d'ouverture</label>
            <input type="time" name="ouverture1" step="600" value="<?php echo $ouverture;?>">
            <label for="fermeture1">Heure de fermeture</label>
            <input type="time" name="fermeture1" step="600" value="<?php echo $fermeture;?>">
            <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
            <button type="submit" name="update">Mettre à jour</button>
    			</form>
        </div>
      </div>
    </div>
    <?php include 'footer.php'; ?>
  </body>
</html>
<?php }else{
  header('Location: index.php');
} ?>
