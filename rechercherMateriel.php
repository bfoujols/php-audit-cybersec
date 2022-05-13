<?php
/** 
 * Script de contr�le et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
$repInclude = './include/';
$repVues = './vues/';

require($repInclude . "_init.inc.php");

$id="";
if (isset($_GET['id']))
{
$id = $_GET['id'];
}  
$lemateriel = rechercheraMateriel($id);
  
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
   $unid=$_POST["id"];
   $unmodele=$_POST["modele"];
   $lemateriel=rechercherMaterielle($unid, $unmodele);
}

// Construction de la page Rechercher
// pour l'affichage (appel des vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues ."erreur.php");
if ($etape ==1)
{
 include($repVues."vRechercherMaterielForm.php") ; 
}
else
{
 include($repVues."vRechercherMaterielForm.php") ; 
}
include($repVues."pied.php") ;
?>
  
