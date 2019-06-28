<?php
  require "php/connex_bdd.php";
  $reponse = $bdd->prepare("SELECT * FROM breves ORDER BY id_breves DESC");
  $reponse->execute();
?>
