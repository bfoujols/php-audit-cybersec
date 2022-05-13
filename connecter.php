<?php
/** 
 * Script de contr�le et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 

 $repVues = './vues/';
  require("./include/_bdGestionDonnees.lib.php");
  require("./include/_gestionSession.lib.php");
  require("./include/_utilitairesEtGestionErreurs.lib.php");
  // d�marrage ou reprise de la session
  initSession();
  // initialement, aucune erreur ...
  $tabErreurs = array();


if (count($_POST)==0)
{
  $etape = 1;
}
else
{

  
  $unLog=$_POST["log"];
  $unMdp=$_POST["mdp"];

  $etape = 2;
  $cat=rechercherUtilisateur($unLog, $unMdp,$tabErreurs);
  // Si aucun utilisateur n'est trouv�, c'est � dire si la cat�gorie d'utilisateur est nulle
  if ($cat=="nulle")
  {
    $message = "Aucun utilisateur ne correspond à ce login / mot de passe";
    ajouterErreur($tabErreurs, $message);
    $etape = 1;
  }
  else
  {
    // Initialiser les variables de session
    connecter($unLog, $unMdp, $cat);    
  }
  
}

// Construction de la page Rechercher
// pour l'affichage (appel des vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues ."erreur.php");
if ($etape==1)
{
  include($repVues."vConnecterForm.php"); ;
}
else
{
  include($repVues."vAccueil.php"); ;
}
include($repVues."pied.php") ;
?>
  
