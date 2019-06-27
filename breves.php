<?php
  session_start();
  if ($_SESSION['statut'] == 'administrateur'){
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Liste des brèves</title>
    <link rel="stylesheet" href="css/fontawesome-5.9.0/css/all.min.css">
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
    <?php include "header.php"; ?>
    <div class="">
      <h1>Brèves</h1>
      <a href="#">Création de brève</a>
    </div>
    <?php include "php/requetes/liste_breves.php";
    while ($donnees = $reponse->fetch()){
    ?>
    <div class="breve">
      <h3><?php echo $donnees['titre_breves']; ?></h3>
      <p>
        <?php
        echo $donnees['contenu_breves'];
        ?>
      </p>
      <h5>
        Supprimer cette brève: <a href='php/requetes/trash_breve.php?del=<?php echo $donnees['id_breves']; ?>'><i class="fas fa-trash-alt"></i></a>;
      </h5>
    </div>
  <?php } ?>
    <?php include "footer.php"; ?>
  </body>
</html>
<?php }else{
  header('Location: index.php');
  } ?>
