<?php //doit être placé en début de page, avant le doctype
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
    <section>
      <h1>Accueil</h1>
      <h2>Bienvenue <?php echo $_SESSION['pseudo'] ?></h2>
    </section>
    <section>
      <a href="crea_compte.php">Créer un nouveau compte</a>
      <a href="crea_materiel.php">Créer un nouveau matériel</a>
    </section>
    <section>
      <table>
        <tr>
          <td>Nom</td>
          <td>Prenom</td>
          <td>Carte</td>
        </tr>
        <?php require 'php/requete_user.php';//appel bdd ?>
        <tr>
          <td><?php echo $donnees["nom"]; ?></td>
          <td><?php echo $donnees["prenom"]; ?></td>
          <td><?php echo $donnees["carte"]; ?></td>
        </tr>
      <?php }
      //fin appel ?>
      </table>
    </section>

    <?php include "footer.php"; ?>
  </body>
</html>
<?php } else {
  header("Location: index.php"); //à la fin de la page après la balise html
 } ?>
