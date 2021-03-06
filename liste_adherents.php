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
          <h1>Liste des adhérents</h1>
          <p>
            <a href="creation_compte.php">Créer un compte</a>
          </p>
        </div>
        <div class="perso">
          <table>
            <caption>Liste des adhérents</caption>
            <tr>
              <td>Nom</td>
              <td>Prenom</td>
              <td>Date de naissance</td>
              <td>Date d'inscription</td>
              <td>Pseudo</td>
              <td>Numéro de carte</td>
              <td>PEGI</td>
              <td>Fin d'abonnement</td>
              <td>Temps accordé</td>
              <td>Modifier le compte</td>
              <td>Supprimer le compte</td>
            </tr>
            <?php include "php/requetes/adherents_list.php";
              while ($donnees = $reponse->fetch()){
            ?>
            <tr>
              <td><?php echo $donnees['nom']; ?></td>
              <td><?php echo $donnees['prenom']; ?></td>
              <td><?php echo $donnees['date_naissance']; ?></td>
              <td><?php echo $donnees['date_inscription']; ?></td>
              <td><?php echo $donnees['pseudo']; ?></td>
              <td><?php echo $donnees['carte']; ?></td>
              <td><?php echo $donnees['pegi']; ?></td>
              <td><?php echo $donnees['fin_inscription']; ?></td>
              <td><?php echo $donnees['temps'] ?></td>
              <td><a href="edit.php?id=<?php echo $donnees['id_user']; ?>"><i class="fas fa-cogs"></i></a></td>
              <td><a href="php/crud/suppression/delete.php?id=<?php echo $donnees['id_user']; ?>" onClick="return confirm('Etes vous certain de vouloir supprimer cet utilisateur?')"><i class="fas fa-trash-alt"></i></a></td>
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
