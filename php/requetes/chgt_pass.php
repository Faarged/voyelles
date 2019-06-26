<?php
  session_start();
  require "../connex_bdd.php";
  $pass = isset($_POST['pass']) ? $_POST['pass'] : NULL;
  $confirm = isset($_POST['confirm_pass']) ? $_POST['confirm_pass'] : NULL;
  if($pass == $confirm){
    $pass_hache = password_hash($_POST['pass'], PASSWORD_BCRYPT);
    $req = $bdd->prepare("UPDATE users SET pass = :pass WHERE id_user =" .$_SESSION['id']);
    $req->execute(array(
      'pass' => $pass_hache
    ));
    header('Location: ../../accueil.php');
  }else{
    echo "Erreur de confirmation du mot de passe";
  }
?>
