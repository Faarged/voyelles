<?php

include ('connex_bdd.php');

$pseudo = isset($_POST['pseudo1']) ? $_POST['pseudo1'] : NULL;
$pass = isset($_POST['pass1']) ? $_POST['pass1'] : NULL;


//  Récupération de l'utilisateur et de son pass hashé
$req = $bdd->prepare('SELECT id, pass FROM users WHERE pseudo = :pseudo');
$req->execute(array(
    'pseudo' => $pseudo));
$resultat = $req->fetch();

// Comparaison du pass envoyé via le formulaire avec la base
$isPasswordCorrect = password_verify($_POST['pass1'], $resultat['pass']);

if (!$resultat)
{
    echo 'Mauvais identifiant ou mot de passe !';

}
else
{
    if ($isPasswordCorrect) {
        session_start();
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['pseudo'] = $pseudo;
        header("Location: ../accueil.php");
    }
    else {
        echo 'Mauvais identifiant ou mot de passe !';
        header("Location: index.php");
    }
}
