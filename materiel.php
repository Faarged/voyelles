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
    <div class="matos">
      <h1>Liste du matériel</h1>
      <a href="crea_materiel.php">Ajouter du matériel</a>
      <table>
        <tr>
          <td>Nom</td>
          <td>Type</td>
          <td>Supprimer</td>
        </tr>
        <?php include "php/requetes/liste_matos.php";
          while ($donnees = $reponse->fetch()){
        ?>
        <tr>
          <td><?php echo $donnees['nom_materiel']; ?></td>
          <td><?php echo $donnees['type']; ?></td>
          <td><a href="php/crud/suppression/suppr_materiel.php?id=<?php echo $donnees['id_materiel']; ?>" onClick="return confirm('Etes vous certain de vouloir supprimer ce materiel?')"><i class="fas fa-trash-alt"></i></a></td>
        </tr>
        <?php } ?>
      </table>
    </div>
    <?php include "footer.php"; ?>
  </body>
</html>
<?php }else{
  header('Location: index.php');
}
?>
