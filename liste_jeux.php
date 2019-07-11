<?php session_start();
  if ($_SESSION['statut'] == 'administrateur'){
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Liste des adhérents</title>
    <link rel="stylesheet" href="css/fontawesome-5.9.0/css/all.min.css">
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
    <?php include "header.php"; ?>
    <div class="corps">
      <?php include "navadmin.php" ?>
      <div class="contenu">
        <div class="titre">
          <h1>Liste des jeux</h1>
          <p>
            <a href="creation_jeu.php">Créer un jeu</a>
          </p>
        </div>
        <div class="perso">
          <table>
            <caption>Liste des adhérents</caption>
            <tr>
              <td>Jeu</td>
              <td>PEGI</td>
              <td>Supports</td>
              <td>Supprimer le compte</td>
            </tr>
            <?php include "php/requetes/jeu_list.php";
              while ($donnees = $reponse->fetch()){
            ?>
            <tr>
              <td><?php echo $donnees['titre']; ?></td>
              <td><?php echo $donnees['pegi_jeu']; ?></td>
              <td><?php echo $donnees['nom_materiel']; ?></td>
              <td><a href="php/crud/suppression/suppr_jeu.php?del=<?php echo $donnees['id_jeu']; ?>" onClick="return confirm('Etes vous certain de vouloir supprimer <?php echo $donnees ['titre'];?> sur <?php echo $donnees['nom_materiel']; ?> ?')"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
          <?php } ?>
          </table>
        </div>
      </div>
    </div>
    <?php include "footer.php"; ?>
  </body>
</html>
<?php }else{
  header('Location: index.php');
} ?>
