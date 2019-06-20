<?php //doit être placé en début de page, avant le doctype
session_start();
if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
{

?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
    <?php include "header.php"; ?>

    <h2>Bienvenue <?php echo $_SESSION['pseudo'] ?></h2>

    <?php include "footer.php"; ?>
  </body>
</html>
<?php } else {
  header("Location: index.php"); //à la fin de la page après la balise html
 } ?>
