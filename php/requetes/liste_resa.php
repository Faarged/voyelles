<?php   require "php/connex_bdd.php";
  $reponse = $bdd->prepare("SELECT * FROM reservation, users, fait
      WHERE reservation.id_resa = fait.id_resa
      AND users.id_user = fait.id_user
      ORDER BY date_resa DESC ");
      $reponse->execute();?>
