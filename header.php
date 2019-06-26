<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/fontawesome-5.9.0/css/all.min.css">
<header>
  <p>ESPACE<strong>NUMERIQUE</strong><p>
  <hr>
  <center>
    <p class="nav">
      <a href="accueil.php">Accueil</a> -
      <a href="mon_compte.php?id=<?php echo $_SESSION['id']; ?>">Mon compte</a> -
      <a href="#">Mes réservations</a> -
      <a href="php/deco.php"><i class="fas fa-sign-out-alt">Déconnecter <?php
                      if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
                      {
                          echo $_SESSION['pseudo'];
                      } ?></i></a>
  </center>
  <hr>

</header>
