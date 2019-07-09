<?php
session_start();
if ($_SESSION['statut'] == 'administrateur'){
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="css/fontawesome-5.9.0/css/all.min.css">
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
    <?php include "header.php"; ?>
    <div class="corps">
      <?php include "navadmin.php" ?>
      <div class="accueil">
      <div>
        <h1>Accueil</h1>
        <h2>Bienvenue <?php echo $_SESSION['pseudo']; ?></h2>
      </div>
      <div>
        <a href="creation_compte.php">Créer un nouveau compte</a><br>
        <a href="crea_materiel.php">Créer un nouveau matériel</a>
      </div>
      <div class="prochains_departs">
        <table><br>
          <caption>Les prochains départs</caption>
          <tr>
            <td>Nom</td>
            <td>Prenom</td>
            <td>Carte</td>
            <td>Début de la réservation</td>
            <td>Durée utilisée</td>
            <td>Temps maximum</td>
          </tr>
          <?php include 'php/requetes/requete_user.php';//appel bdd
            while ($donnees = $reponse->fetch()){ ?>
          <tr>
            <td><?php echo $donnees["nom"]; ?></td>
            <td><?php echo $donnees["prenom"]; ?></td>
            <td><?php echo $donnees["carte"]; ?></td>
            <td><?php echo $donnees['debut_resa']; ?></td>
            <td><?php echo $donnees['duree']; ?></td>
            <td><?php echo $donnees['temps']; ?></td>
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
      </div>
    </div>
    <?php include "footer.php"; ?>
  </body>
</html>
<?php }elseif($_SESSION['statut'] == 'adherent'){ ?>
  <!DOCTYPE html>
  <html lang="fr">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Accueil</title>
      <link rel="stylesheet" href="css/fontawesome-5.9.0/css/all.min.css">
      <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
      <?php include "header.php"; ?>
      <div class="accueil">
        <div>
          <h1>Accueil</h1>
          <h2>Bienvenue <?php echo $_SESSION['pseudo']; ?></h2>
        </div>
        <div class="ingame_time">
          <table>
            <caption>Mes réservations du jours</caption>
            <tr>
              <td>Heure de réservation</td>
              <td>Temps utilisé</td>
            </tr>
            <?php include 'php/requetes/resa_adherent_journalieres.php';
                  while ($donnees = $reponse->fetch()){ ?>
            <tr>
              <td><?php echo $donnees['debut_resa']; ?></td>
              <td><?php echo $donnees['duree']; ?></td>
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
      </div>
      <?php include "footer.php"; ?>
    </body>
  </html>
<?php } else {
  header("Location: index.php"); //à la fin de la page après la balise html
 } ?>
