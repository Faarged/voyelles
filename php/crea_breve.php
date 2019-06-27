<?php
  require "connex_bdd.php";
  $titre = isset($_POST['titre']) ? $_POST['titre'] : NULL;
  $contenu = isset($_POST['contenu']) ? $_POST['contenu'] : NULL;

  $req = $bdd->prepare('INSERT INTO breves(titre_breves, contenu_breves)
    VALUES(:title, :content)');
  $req->execute(array(
    'title' => $titre,
    'content' => $contenu
  ));
  header('Location: ../breves.php');
?>
