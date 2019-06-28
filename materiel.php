<?php
  session_start();
  if ($_SESSION['statut'] == 'administrateur'){
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php include "header.php"; ?>
    <div class="">
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
          <td><i class="fas fa-trash-alt"></i></td>
        </tr>
        <?php } ?>
      </table>
    </div>
    <?php include "footer.php"; ?>
  </body>
</html>
<?php }else{
  header('Location: index.php');
?>
