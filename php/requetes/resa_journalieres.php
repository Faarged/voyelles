<?php
  require "php/connex_bdd.php";
  $date = date("Y-m-d");
  $reponse = $bdd->prepare("SELECT * FROM reservation, users, fait
    WHERE reservation.id_resa = fait.id_resa
    AND users.id_user = fait.id_user
    AND reservation.date_resa = :date_jour
    AND CURTIME() <= ADDTIME(debut_resa, duree)
    ORDER BY date_resa DESC");
  $reponse->execute(array(
    'date_jour' => $date
  ));
?>
