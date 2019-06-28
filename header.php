<header>
  <p>ESPACE<strong>NUMERIQUE</strong><p>
  <hr>
  <div class="navbar">
    <p class="nav">
      <a href="accueil.php">Accueil</a> -
      <a href="mon_compte.php">Mon compte</a> -
      <a href="reservations.php">Mes réservations</a> -
      <a href="php/deco.php">
        <i class="fas fa-sign-out-alt">Déconnecter <?php echo $_SESSION['pseudo'];?></i>
      </a>
  </div>
  <hr>
</header>

<div class="navadmin">
  <nav>
    <img src="img/calen.png" alt="">
    <h3>Administration</h3>
    <ul>
      <li><a href="liste_adherents.php">Adhérents</a></li>
      <li><a href="liste_admin.php">Administrateurs</a></li>
      <li><a href="breves.php">Brèves</a></li>
      <li><a href="#">Matériel</a></li>
      <li><a href="#">Configuration</a></li>
      <li><a href="#">Statistiques</a></li>
    <ul>
  </nav>
</div>
