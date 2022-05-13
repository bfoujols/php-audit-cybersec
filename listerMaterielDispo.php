<?php
/** 
 * Script de contr�le et d'affichage du cas d'utilisation "Rechercher"
 * @package default
 * @todo  RAS
 */
 
  $repInclude = './include/';
  $repVues = './vues/';
  
  require($repInclude . "_init.inc.php");
 
  $idMateriel="";
  if (isset($_GET['idMateriel']))
  {
  $idMateriel = $_GET['idMateriel'];
  }  
  $leMateriel = listerMD($idMateriel);
  
  // Construction de la page Rechercher
  // pour l'affichage (appel des vues)
  include($repVues."entete.php") ;
  include($repVues."menu.php") ;
  include($repVues."vMaterielDispo.php");
  include($repVues."pied.php") ;
  ?>
    
