<?php
  require 'php/connex_bdd.php';
  $pegi = $bdd->prepare('SELECT COUNT(*) AS pegi FROM reservation, users, fait
  WHERE users.id_user= fait.id_user
  AND fait.id_resa= reservation.id_resa
  AND pegi = 18');
  $pegi->execute();
  while ($donnees = $pegi->fetch()){
    $pegi_18 = $donnees['pegi'];
  }
?>
