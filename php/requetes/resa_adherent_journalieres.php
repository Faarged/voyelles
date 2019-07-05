<?php
  require "php/connex_bdd.php";
  $reponse = $bdd->prepare("SELECT * FROM users, fait, reservation
    WHERE users.id_user = fait.id_user
    AND reservation.id_resa = fait.id_resa
    AND users.id_user = '".$_SESSION['id']."'
    AND date_resa = CURDATE()
    ORDER BY reservation.debut_resa
    ");
  $reponse->execute();
?>
