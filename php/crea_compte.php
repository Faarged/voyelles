<?php
require ('connex_bdd.php');

// Vérification de la validité des informations
$nom = isset($_POST['nom']) ? $_POST['nom'] : NULL;
$prenom = isset($_POST['prenom']) ? $_POST['prenom'] : NULL;
$naissance = isset($_POST['date_naissance']) ? $_POST['date_naissance'] : NULL;
$inscription = isset($_POST['date_inscription']) ? $_POST['date_inscription'] : NULL;
$pseudo = isset($_POST['pseudo']) ? $_POST['pseudo'] : NULL;
$carte = isset($_POST['carte']) ? $_POST['carte'] : NULL;
$pass = isset($_POST['pass']) ? $_POST['pass'] : NULL;
$pegi = isset($_POST['pegi']) ? $_POST['pegi'] : NULL;
$statut = isset($_POST['statut']) ? $_POST['statut'] : NULL;
$desinscription = isset($_POST['fin_inscription']) ? $_POST['fin_inscription'] : NULL;


// Hachage du mot de passe
$pass_hache = password_hash($_POST['pass'], PASSWORD_BCRYPT);

// Insertion
 $req = $bdd->prepare('INSERT INTO users(nom, prenom, date_naissance, date_inscription, pseudo, carte, pass, pegi, statut, fin_inscription)
 VALUES(:nom, :prenom, :date_naissance, :date_inscription, :pseudo, :carte, :pass, :pegi, :statut, :fin_inscription)');
 $req->execute(array(
   'nom' => $nom,
   'prenom' => $prenom,
   'date_naissance' => $naissance,
   'date_inscription' => $inscription,
   'pseudo' => $pseudo,
   'carte' => $carte,
   'pass' => $pass_hache,
   'pegi' => $pegi,
   'statut' => $statut,
   'fin_inscription' => $desinscription));

header('Location: ../accueil.php')
?>
