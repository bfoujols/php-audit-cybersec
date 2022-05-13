<?php
/** 
 * Script de contr�le et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
$repInclude = './include/';
$repVues = './vues/';

require($repInclude . "_init.inc.php");
  

if (count($_POST)==0)
{
  $etape = 1;
}
else
{
  $etape = 2;  
  $idVis=$_POST["idVis"];
  $RefMat=$_POST["RefMat"];
  $DateResti=$_POST["DateResti"];
  restituer($idVis,$RefMat,$DateResti, $tabErreurs);
  if (nbErreurs($tabErreurs)==0)
  {
    $reussite = 1;
    $messageActionOk = "Le materiel a bien été Résitituer";
  }

}

// Construction de la page Rechercher
// pour l'affichage (appel des vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues ."erreur.php");
if ($etape==1)
{
  include($repVues."vRestituer.php"); ;
}

include($repVues."pied.php") ;
?>
  
