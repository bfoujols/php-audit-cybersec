<?php
/** 
 * Script de contr�le et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
$repInclude = './include/';
$repVues = './vues/';

require($repInclude . "_init.inc.php");
  
// $unNom=lireDonneePost("nom", "");
// $unMail=lireDonneePost("mail", "");
// // $unMdp=lireDonneePost("mdp", "");

// if (count($_POST)==0)
// {
//   $etape = 1;
// }
// else
// {
//   $etape = 2;
//   ajouter($unNom, $unMail ,  $tabErreurs);
// }
if (count($_POST)==0)
{
  $etape = 1;
}
else
{
  $etape = 2;
   $uneMarque=$_POST["marque"];
   $unModel=$_POST["model"];
   $uneDimension=$_POST["dimensionL"];
    
  ajouterMateriel($uneMarque, $unModel,$uneDimension,$tabErreurs);
}

// Construction de la page Rechercher
// pour l'affichage (appel des vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues ."erreur.php");
include($repVues."vAjouterFormMateriel.php") ;
include($repVues."pied.php") ;
?>
  
