<?php
  require 'php/connex_bdd.php';
  include 'requetes/stat_resa_pegi6.php';
  include 'requetes/stat_resa_pegi9.php';
  include 'requetes/stat_resa_pegi12.php';
  include 'requetes/stat_resa_pegi18.php';
  include 'requetes/total_resa.php';


    $calcul_6 = ($pegi_6 / $total_resa) * 100;
    $calcul_9 = $pegi_9 / $total_resa * 100;
    $calcul_12 = $pegi_12 / $total_resa * 100;
    $calcul_18 = $pegi_18 / $total_resa * 100;
?>
