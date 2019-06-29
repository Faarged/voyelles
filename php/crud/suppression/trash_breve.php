<?php
  session_start();
  require "../../connex_bdd.php";
  $id = $_GET['del'];
  $sup = $bdd->prepare('DELETE FROM breves WHERE id_breves = :id');
  $sup->execute(array('id' => $id));
  header('Location: ../../../breves.php');
?>
