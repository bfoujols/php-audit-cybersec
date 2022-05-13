<?php
/** 
 * Script de contr�le et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
$repInclude = './include/';
$repVues = './vues/';

require($repInclude . "_init.inc.php");

$idVisiteur="";
if (isset($_GET['Vis_id']))
{
$idVisiteur = $_GET['Vis_id'];
}  
$levisiteur = recherchera($idVisiteur);
  
// $uneRef=lireDonneePost("ref", "");
//$uneDes=lireDonneePost("des", "");
//$unPrix=lireDonneePost("prix", "");
//$uneImage=lireDonneePost("image", "");
//$uneCat=lireDonneePost("cat", "");

if (count($_POST)==0)
{
  $etape = 1;
}
else
{
  $etape = 2;
   $unNom=$_POST["VIS_NOM"];
   $unMail=$_POST["Vis_mail"];
   $levisiteur=rechercher($unNom, $unMail);
}

// Construction de la page Rechercher
// pour l'affichage (appel des vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues ."erreur.php");
if ($etape ==1)
{
 include($repVues."vRechercherForm.php") ; 
}
else
{
 include($repVues."vFleurs.php") ; 
}
include($repVues."pied.php") ;
?>
  
