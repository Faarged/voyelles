<?php
session_start();
if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
{

?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
    <?php include "header.php"; ?>
    <div>
      <h1>Accueil</h1>
      <h2>Bienvenue <?php echo $_SESSION['pseudo'] ?></h2>
    </div>
    <div>
      <a href="crea_compte.php">Créer un nouveau compte</a>
      <a href="crea_materiel.php">Créer un nouveau matériel</a>
    </div>
    <div class="prochains_departs">
      <table>
        <tr>
          <td>Nom</td>
          <td>Prenom</td>
          <td>Carte</td>
        </tr>
        <?php include 'php/requetes/requete_user.php';//appel bdd
          while ($donnees = $reponse->fetch()){ ?>
        <tr>
          <td><?php echo $donnees["nom"]; ?></td>
          <td><?php echo $donnees["prenom"]; ?></td>
          <td><?php echo $donnees["carte"]; ?></td>
        </tr>
      <?php } ?>
      </table>
    </div>
    <section>
      <h3>Brèves</h3>
      <div class="breve">
        <?php include 'php/requetes/breve_accueil.php';
          while ($donnees = $reponse->fetch()){ ?>
        <h4><?php echo $donnees['titre_breves']; ?></h4>
        <p><?php echo $donnees['contenu_breves']; ?></p>
      <?php } ?>
      </div>
    </section>

    <?php include "footer.php"; ?>
  </body>
</html>
<?php } else {
  header("Location: index.php"); //à la fin de la page après la balise html
 } ?>
