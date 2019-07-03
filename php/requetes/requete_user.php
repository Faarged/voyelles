<?php
  require "php/connex_bdd.php";
  $reponse = $bdd->prepare("SELECT * FROM users, fait, reservation
    WHERE users.id_user = fait.id_user
    AND reservation.id_resa = fait.id_resa
    AND date_resa = CURDATE()
    AND CURTIME() >= ADDTIME(\"reservation.debut_resa\", \"reservation.duree\")
    ORDER BY reservation.debut_resa
    LIMIT 5");
  $reponse->execute();
?>
