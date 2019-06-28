<?php
try
{
    // On se connecte à MySQL
$bdd = new PDO('mysql:host=localhost;dbname=consonne;charset=utf8', 'lilian', '21septembre', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(PDOexception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
        print 'Erreur : '.$e->getMessage(). '<br />';
        die();
}
