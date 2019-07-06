<?php
require "php/connex_bdd.php";
$reponse = $bdd->prepare('SELECT * FROM configuration');
$reponse->execute();
?>
