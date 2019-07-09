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
    <title>Création de compte</title>
    <link rel="stylesheet" href="css/fontawesome-5.9.0/css/all.min.css">
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
    <?php include "header.php"; ?>
    <div class="corps">
      <?php include "navadmin.php" ?>
      <div class="contenu">
        <h1>Création de compte</h1>
        <form class="crea-compte" action="php/crea_compte.php" method="post">
          <label for="nom">Nom</label>
            <input type="text" class="nom" name="nom" placeholder="Nom">
          <label for="prenom">Prenom</label>
            <input type="text" class="prenom" name="prenom" placeholder="Prenom">
          <label for="date_naissance">Date de naissance</label>
            <input type="date" class="date_naissance" name="date_naissance">
          <label for="date_inscription">Date d'inscription</label>
            <input type="date" class="date_inscription" name="date_inscription" value="<?php echo date('Y-m-d'); ?>">
          <label for="pseudo">Pseudo</label>
            <input type="text" name="pseudo" class="pseudo" placeholder="pseudo">
          <label for="carte">Numéro de carte</label>
            <input type="text" name="carte" class="carte" placeholder="numéro de carte">
          <label for="pass">Mot de passe</label>
            <input type="text" name="pass" class="pass" placeholder="mot de passe">
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
              <div class="radio">
          <label for="statut">STATUT</label>
              <input type="radio" id="option1" autocomplete="off" name="statut" value="adherent">
                <p>Adhérent</p>
              <input type="radio" id="option2" autocomplete="off" name="statut" value="administrateur">
                <p>Administrateur</p>
            </div>
          <label for="fin_inscription">Date de fin de l'abonnement</label>
            <input type="date" name="fin_inscription" class="fin_inscription">
        <label for="temps">Temps accordé</label>
            <input type="time" min="01:00" max="02:00" step="3600" name="temps" value="">
          <button type="submit" name="submit" class="valider" value="envoyer">Valider</button>
        </form>
      </div>
    </div>
    <?php include "footer.php"; ?>
  </body>
</html>
<?php } else {
  header("Location: accueil.php"); //à la fin de la page après la balise html
 } ?>
