<?php
  session_start();
  if ($_SESSION['statut'] == 'administrateur')
  {
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Création de jeu</title>
  <link rel="stylesheet" href="css/fontawesome-5.9.0/css/all.min.css">
  <link rel="stylesheet" href="css/main.css">
</head>

<body>
  <?php include "header.php"; ?>
  <div class="corps">
    <?php include "navadmin.php" ?>
    <div class="contenu">
      <div class="titre">
        <h1>Création de jeu</h1>
      </div>
      <div class="perso">
        <form class="crea-compte" action="php/crea_jeu.php" method="post">
          <label for="nom">Titre</label>
          <input type="text" name="titre" placeholder="Titre">

          <!--pegi, statut, date de fin -->
          <label for="pegi">PEGI</label>
          <div class="radio">
            <input type="radio" id="option1" autocomplete="off" name="pegi" value="6">
            <p>6</p>
            <input type="radio" id="option2" autocomplete="off" name="pegi" value="9">
            <p>9</p>
            <input type="radio" id="option3" autocomplete="off" name="pegi" value="12">
            <p>12</p>
            <input type="radio" id="option4" autocomplete="off" name="pegi" value="18">
            <p>18</p>
          </div>
            <?php include 'php/requetes/search_materiel.php';
            while ($support = $reponse->fetch()) {
            ?>
            <label for="<?php echo $support["nom_materiel"]; ?>"><?php echo $support["nom_materiel"]; ?></label>
            <input type="checkbox" name="materiel[]" value="<?php echo $support["id_materiel"]; ?>">
          <?php } ?>
          <button type="submit" name="submit">Valider</button>
        </form>
      </div>
    </div>
  </div>
  <?php include "footer.php"; ?>
</body>

</html>
<?php } else {
  header("Location: accueil.php"); //à la fin de la page après la balise html
 } ?>
