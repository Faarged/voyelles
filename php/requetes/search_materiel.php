<?php
  require "php/connex_bdd.php";
  $reponse = $bdd->prepare('SELECT * FROM materiel
    WHERE type="console"
    OR type="pc"');
  $reponse->execute();
?>
