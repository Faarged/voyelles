<?php
  require "php/connex_bdd.php";
  $reponse = $bdd->prepare("SELECT * FROM materiel ORDER BY nom DESC");
  $reponse->execute();
?>
