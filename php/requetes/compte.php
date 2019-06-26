<?php
  require "php/connex_bdd.php";
  $reponse = $bdd->prepare("SELECT * FROM users WHERE id_user =".$_SESSION['id']);
  $reponse->execute();
?>
