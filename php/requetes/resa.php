<?php
  require "php/connex_bdd.php";
  $reponse = $bdd->prepare("SELECT * FROM reservation, users, fait
    WHERE reservation.id_resa = fait.id_resa
    AND users.id_user = fait.id_user
    AND users.id_user =" .$_SESSION['id'].
    "LIMIT 10");
  $reponse->execute();
?>
