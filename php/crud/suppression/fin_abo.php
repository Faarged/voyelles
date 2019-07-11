<?php
  require 'php/connex_bdd.php';

  $recup = $bdd->prepare('SELECT * FROM `users`
    WHERE CURDATE() > fin_inscription');
  $recup->execute();
  while ($user = $recup->fetch()) {
    $id = $user['id_user'];
    $joint = $bdd->prepare('DELETE FROM fait WHERE id_user = :id');
    $joint->execute(array('id' => $id));
    $supp = $bdd->prepare('DELETE FROM users WHERE id_user = :id');
    $supp->execute(array('id' => $id));
  }
?>
