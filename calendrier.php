<?php
function Calendrier($prefixe = "calendrier_", $prefixe_css = "calendrier_",
        $date_URL = "", $parametre_URL = "date",
        $utilise_session = false, $preserve_URL = true, $js = false,
        $js_URL = "") {


//
// FONCTIONS
//

// Fonction d'affichage du code HTML : si $js = true, on ne met pas de
// saut de ligne
if (! function_exists("calendrier_affiche")) {
  function calendrier_affiche($texte, $js) {
    if ($js) {
      echo "document.writeln('".$texte."');\n";
    } else {
      echo $texte."\n";
    }
  }
}

// Sous-fonction qui ajoute le parametre $parametre_URL a la valeur $date
// a l'URL $URL indiquee.
// Utilise pour les fleches encadrant le titre du calendrier.
if (! function_exists("calendrier_calcule_URL")) {
  function calendrier_calcule_URL($URL, $parametre_URL, $date, $preserve_URL,
                  $utilise_session) {
    $composants_URL = parse_url($URL);
    $nouvelle_URL = $composants_URL["path"]."?";
    $ajout_SID = $utilise_session;
    // On recupere les parametres d'URL existant seulement si on le demande
    if ($preserve_URL && isset($composants_URL["query"])) {
      parse_str($composants_URL["query"], $query_string);
      // On reconstruit la query string
      foreach ($query_string as $param => $valeur) {
        if ($param != $parametre_URL) {
          $nouvelle_URL .= $param."=".urlencode($valeur)."&amp;";
        }
        // Si le SID est deja present, pas la peine de le rajouter
        if ($utilise_session && $param == session_name()) {
          $ajout_SID = false;
        }
      }
    }

    // On ajoute la date
    $nouvelle_URL .= $parametre_URL."=".$date;

    // On ajoute egalement l'identifiant de session si necessaire
    if ($ajout_SID && SID != "") {
      $nouvelle_URL .= "&amp;".SID;
    }

    return $nouvelle_URL;

  }
}

// Sous-fonction qui calcule la date du mois precedent au format mmaaaa
if (! function_exists("calendrier_mois_precedent")) {
  function calendrier_mois_precedent($mois, $annee) {
    if ($mois == 1) {
      $nouveau_mois = "12";
      $nouvelle_annee = $annee - 1;
    } else {
      $nouveau_mois = (($mois > 10)?"":"0").($mois - 1);
      $nouvelle_annee = $annee;
    }

    return $nouveau_mois.$nouvelle_annee;
  }
}

// Sous-fonction qui calcule la date du mois suivant au format mmyyyy
if (! function_exists("calendrier_mois_suivant")) {
  function calendrier_mois_suivant($mois, $annee) {
    if ($mois == 12) {
      $nouveau_mois = "01";
      $nouvelle_annee = $annee + 1;
    } else {
      $nouveau_mois = (($mois < 9)?"0":"").($mois + 1);
      $nouvelle_annee = $annee;
    }

    return $nouveau_mois.$nouvelle_annee;
  }
}

//
// VARIABLES
//
// Nom des mois en francais
$nom_mois = array("janvier", "f&eacute;vrier", "mars", "avril", "mai", "juin",
        "juillet", "ao&ucirc;t", "septembre", "octobre", "novembre",
        "d&eacute;cembre");

// Variables globales
global $_SESSION;
global $_SERVER;
global $_GET;


// Si integration JavaScript avec session, on cree la session
if ($js && $utilise_session) {
  session_start();
}

// Jour d'aujourd'hui
$aujourdhui = date("dmY");

// Recuperation du mois et de l'annee a afficher
if (isset($_GET[$prefixe."date"])) {
  if ($_GET[$prefixe."date"] != "") {
    $mois  = (int)substr($_GET[$prefixe."date"], 0, 2);
    $annee = substr($_GET[$prefixe."date"], 2);
  }
}

// Calcul de la valeur par defaut
if (!isset($mois)) {
  $mois = gmdate("n");
  // Recuperation de la session ou non
  if ($utilise_session && isset($_SESSION[$prefixe."mois"])) {
    $mois = $_SESSION[$prefixe."mois"];
  }
}
// Mise a jour en session du mois a afficher
if ($utilise_session) {
  $_SESSION[$prefixe."mois"] = $mois;
}

// Calcul de la valeur par defaut
if (!isset($annee)) {
  $annee = gmdate("Y");
  // Recuperation de la session ou non
  if ($utilise_session && isset($_SESSION[$prefixe."annee"])) {
    $annee = $_SESSION[$prefixe."annee"];
  }
}
// Mise a jour en session de l'annee a afficher
if ($utilise_session) {
  $_SESSION[$prefixe."annee"] = $annee;
}

// Affichage du haut du calendrier
if ($js) {
  $URL_page = $js_URL;
} else {
  $URL_page = $_SERVER["REQUEST_URI"];
}
calendrier_affiche("<table class=\"".$prefixe_css."principal\">", $js);
calendrier_affiche("	<tr class=\"".$prefixe_css."titre\">", $js);
calendrier_affiche("		<td class=\"".$prefixe_css."titre_fleche_gauche\"><a href=\"".calendrier_calcule_URL($URL_page, $prefixe."date", calendrier_mois_precedent($mois, $annee), $preserve_URL, $utilise_session)."\" class=\"".$prefixe_css."titre_fleche_gauche_cliquable\">&lt;&lt;</a></td>", $js);
if ($date_URL != "") {
  calendrier_affiche("		<td class=\"".$prefixe_css."titre_mois\">".$nom_mois[$mois - 1]." ".$annee."</td>", $js);
  //calendrier_affiche("		<td class=\"".$prefixe_css."titre_mois\"><a href=\"".calendrier_calcule_URL($date_URL, $parametre_URL, (($mois < 10)?"0":"").$mois.$annee, true, $utilise_session)."\" class=\"".$prefixe_css."titre_mois_cliquable\">".$nom_mois[$mois - 1]." ".$annee."</a></td>", $js);
} else {
  calendrier_affiche("		<td class=\"".$prefixe_css."titre_mois\">".$nom_mois[$mois - 1]." ".$annee."</td>", $js);
}
calendrier_affiche("		<td class=\"".$prefixe_css."titre_fleche_droite\"><a href=\"".calendrier_calcule_URL($URL_page, $prefixe."date", calendrier_mois_suivant($mois, $annee), $preserve_URL, $utilise_session)."\" class=\"".$prefixe_css."titre_fleche_droite_cliquable\">&gt;&gt;</a></td>", $js);
calendrier_affiche("	</tr>", $js);
calendrier_affiche("	<tr>", $js);
calendrier_affiche("		<td colspan=\"3\">", $js);
calendrier_affiche("			<table class=\"".$prefixe_css."tableau\">", $js);
calendrier_affiche("				<tr>", $js);
calendrier_affiche("					<th>lun</th>", $js);
calendrier_affiche("					<th>mar</th>", $js);
calendrier_affiche("					<th>mer</th>", $js);
calendrier_affiche("					<th>jeu</th>", $js);
calendrier_affiche("					<th>ven</th>", $js);
calendrier_affiche("					<th>sam</th>", $js);
calendrier_affiche("					<th>dim</th>", $js);
calendrier_affiche("				</tr>", $js);

// On calcule le premier jour du mois
$premier_jour_mois = gmmktime(0 ,0 ,0 , $mois, 1, $annee);

// On cherche le jour de la semaine de ce premier jour pour savoir de
// combien il faut revenir en arriere pour tomber sur un lundi
$decalage = gmdate("w", $premier_jour_mois) - 1;
if ($decalage == -1) {
  $decalage = 6;
}

// Premier jour du calendrier
$jour_courant = $premier_jour_mois - 3600 * 24 * $decalage;

// On affiche un tableau de 4x7, 5x7 ou 6x7 => 2 boucles imbriquees
// Calcul du nombre de lignes du tableau
$nb_ligne = ceil((gmdate("t", $premier_jour_mois) + $decalage) / 7);
for ($ligne = 1; $ligne <= $nb_ligne; $ligne++) {
  // La premiere boucle sert a afficher les lignes
  calendrier_affiche("				<tr>", $js);

  // La seconde boucle sert a afficher les jours (les colonnes)
  for ($colonne = 1; $colonne <= 7; $colonne++) {
    // Jour du mois en train d'etre analyse
    $jour = gmdate("j", $jour_courant);

    // Si on est samedi ou dimanche, on affiche un fond gris
    if (gmdate("w", $jour_courant) == 6 || gmdate("w", $jour_courant) == 0) {
      $cellule = "					<td class=\"".$prefixe_css."weekend\">";
    } else {
      $cellule = "					<td>";
    }

    // Affichage du jour du mois
    $classe = "";
    if ($date_URL != "") {
      if (gmdate("dmY", $jour_courant) == $aujourdhui) {
        $classe = $prefixe_css."ajourdhui_cliquable";
      } else {
        // Jours hors mois avec classe "hors_mois"
        if (gmdate("n", $jour_courant) != $mois) {
          $classe = $prefixe_css."hors_mois_cliquable";
        } else {
          $classe = $prefixe_css."jour_cliquable";
        }
      }
      if($parametre_URL=="pl_fixe")
        $cellule .= "<div onclick='parent.document.location.href=\"../index.php?page=planning/fixe/index.php&amp;date=".gmdate("Y-m-d", $jour_courant)."\";' class='$classe'>$jour</div>";
      elseif($parametre_URL=="pl_poste")
        $cellule .= "<div onclick='parent.document.location.href=\"../index.php?page=planning/poste/index.php&amp;date=".gmdate("Y-m-d", $jour_courant)."\";' class='$classe'>$jour</div>";
      elseif($parametre_URL=="pl_internes")
        $cellule .= "<div onclick='parent.document.location.href=\"../index.php?page=planning/internes/index.php&amp;date=".gmdate("Y-m-d", $jour_courant)."\";' class='$classe'>$jour</div>";
      else
        $cellule .= "<div onclick='returnDate(\"".$parametre_URL."\",\"".gmdate("Y-m-d", $jour_courant)."\");' class='$classe'>$jour</div>";
    } else {
      // Jours hors mois avec classe "hors_mois"
      if (gmdate("n", $jour_courant) != $mois) {
        $classe = $prefixe_css."hors_mois";
      }
      // Si on est aujourd'hui, classe "aujourdhui"
      if (gmdate("dmY", $jour_courant) == $aujourdhui) {
        $classe = $prefixe_css."aujourdhui";
      }
      if ($classe == "") {
        $cellule .= $jour;
      } else {
        $cellule .= "<span class=\"".$classe."\">".$jour."</span>";
      }
    }

    // Fin de la cellule du jour courant
    calendrier_affiche($cellule."</td>", $js);

    // On passe au jour suivant
    $jour_courant += 3600 * 24 + 1;
  }

  // Fin des lignes
  calendrier_affiche("				</tr>", $js);
}

calendrier_affiche("			</table>", $js);
calendrier_affiche("		</td>", $js);
calendrier_affiche("	</tr>", $js);
calendrier_affiche("</table>", $js);
}
?>
