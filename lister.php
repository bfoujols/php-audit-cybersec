<?php
/** 
 * Script de contr�le et d'affichage du cas d'utilisation "Rechercher"
 * @package default
 * @todo  RAS
 */
 
  $repInclude = './include/';
  $repVues = './vues/';
  
  require($repInclude . "_init.inc.php");
 
  $idVisiteur="";
  if (isset($_GET['idVisiteur']))
  {
  $idVisiteur = $_GET['idVisiteur'];
  }  
  $levisiteur = lister($idVisiteur);
  
  // Construction de la page Rechercher
  // pour l'affichage (appel des vues)
  include($repVues."entete.php") ;
  include($repVues."menu.php") ;
  include($repVues."vVisiteur.php");
  include($repVues."pied.php") ;
  ?>
    
