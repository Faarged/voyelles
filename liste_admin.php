<?php session_start();
  if ($_SESSION['statut'] == 'administrateur'){
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Liste des administrateurs</title>
    <link rel="stylesheet" href="css/fontawesome-5.9.0/css/all.min.css">
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
    <?php include "header.php"; ?>
    <div class="liste_adherents">
      <h1>Liste des administrateurs</h1>
      <a href="creation_compte.php">Créer un compte</a>
      <div class="tableau_adherents">
        <table>
          <tr>
            <td>Nom</td>
            <td>Prenom</td>
            <td>Date de naissance</td>
            <td>Date d'inscription</td>
            <td>Pseudo</td>
            <td>Numéro de carte</td>
            <td>PEGI</td>
            <td>Fin d'abonnement</td>
            <td>Modifier le compte</td>
            <td>Supprimer le compte</td>
          </tr>
          <?php include "php/requetes/admin_list.php";
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
            <td><i class="fas fa-cogs"></i></td>
            <td><a href="php/crud/liste_adherent/delete.php?id=<?php echo $donnees['id_user']; ?>" onClick="return confirm('Etes vous certain de vouloir supprimer cet utilisateur?')"><i class="fas fa-trash-alt"></i></a></td>
          </tr>
        <?php } ?>
        </table>
      </div>
    </div>
    <?php include "footer.php"; ?>
  </body>
</html>
<?php }else{
  header('Location: index.php');
} ?>
