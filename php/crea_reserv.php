<?php
  require "connex_bdd.php";

  $carte = isset($_POST['carte1']) ? $_POST['carte1'] : NULL;
  $date_resa = isset($_POST['date_resa1']) ? $_POST['date_resa1'] : NULL;
  $debut_resa = isset($_POST['debut_resa1']) ? $_POST['debut_resa1'] : NULL;
  $duree = isset($_POST['duree1']) ? $_POST['duree1'] : NULL;
  $materiel = isset($_POST['materiel1']) ? $_POST['materiel1'] : NULL;

  $req = $bdd->prepare('SELECT id_user FROM users WHERE carte ='.$carte);
  $req->execute();
  while ($donnees = $req->fetch()){
    $id_use = $donnees['id_user'];
    }
    $resa = $bdd->prepare('INSERT INTO reservation(date_resa, debut_resa, duree, materiel_res, jeu_reserv)
    VALUES(:resa, :debut, :duree, :materiel, :jeu)');
    $resa->execute(array(
      'resa' => $date_resa,
      'debut' => $debut_resa,
      'duree' => $duree,
      'materiel' => $materiel,
      'jeu' => $jeu
    ));
    $recup = $bdd->prepare("SELECT id_resa FROM reservation
      WHERE date_resa ='".$date_resa."'
      AND debut_resa='".$debut_resa."'
      AND duree='".$duree."'
      AND materiel_res='".$materiel."'");
    $recup->execute();
    while ($my_id = $recup->fetch()){
      $id_re = $my_id['id_resa'];
      }
      $res = $bdd->prepare('INSERT INTO fait(id_resa, id_user)
      VALUES(:id_res, :id_use)');
      $res->execute(array(
        'id_res' => $id_re,
        'id_use' => $id_use
      ));
      header('Location: ../reservations.php')


?>
