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
  $DateEmprunt=$_POST["DateEmprunt"];
  emprunter($idVis,$RefMat,$DateEmprunt, $tabErreurs);
  if (nbErreurs($tabErreurs)==0)
  {
    $reussite = 1;
    $messageActionOk = "Le materiel a bien été emprunter";
  }

}

// Construction de la page Rechercher
// pour l'affichage (appel des vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues ."erreur.php");
if ($etape==1)
{
  include($repVues."vEmprunter.php"); ;
}

include($repVues."pied.php") ;
?>
  
