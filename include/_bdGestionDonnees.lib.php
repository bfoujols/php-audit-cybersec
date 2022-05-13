<?php

// MODIFs A FAIRE
// Ajouter en t�tes 
// Voir : jeu de caract�res � la connection

/** 
 * Se connecte au serveur de donn�es                     
 * Se connecte au serveur de donn�es � partir de valeurs
 * pr�d�finies de connexion (h�te, compte utilisateur et mot de passe). 
 * Retourne l'identifiant de connexion si succ�s obtenu, le bool�en false 
 * si probl�me de connexion.
 * @return resource identifiant de connexion
 */
function connecterServeurBD() 
{
    $PARAM_hote='127.0.0.1'; // le chemin vers le serveur
    $PARAM_port='9001';
    $PARAM_nom_bd='ort_nb_gsb-2022'; // le nom de votre base de donn�es
    $PARAM_utilisateur='root'; // nom d'utilisateur pour se connecter
    $PARAM_mot_passe='yoo'; // mot de passe de l'utilisateur pour se connecter
    $connect = new PDO('mysql:host='.$PARAM_hote.';port='.$PARAM_port.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);
    return $connect;

    //$hote = "localhost";
    // $login = "root";
    // $mdp = "";
    // return mysql_connect($hote, $login, $mdp);
}


/** 
 * Ferme la connexion au serveur de donn�es.
 * Ferme la connexion au serveur de donn�es identifi�e par l'identifiant de 
 * connexion $idCnx.
 * @param resource $idCnx identifiant de connexion
 * @return void  
 */
function deconnecterServeurBD($idCnx) {

}






function lister($idVisiteur)
{
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD � r�ussi
  if (TRUE) 
  {
      
           
      $requete="select * from visiteur";
      if ($idVisiteur!="")
      {
          $requete=$requete." where idVisiteur='".$idVisiteur."';";
      }
      
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
      $i = 0;
      $ligne = $jeuResultat->fetch();
      while($ligne)
      {
          $levisiteur[$i]['Vis_id']=$ligne->Vis_id;
          $levisiteur[$i]['VIS_NOM']=$ligne->VIS_NOM;
          $levisiteur[$i]['Vis_mail']=$ligne->Vis_mail;
          $ligne=$jeuResultat->fetch();
          $i = $i + 1;
      }
  }
  $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  // deconnecterServeurBD($idConnexion);
  return $levisiteur;
}
function listerMD($idMateriel)
{
  $connexion = connecterServeurBD();
  // Si la connexion au SGBD � r�ussi
  if (TRUE) 
  {
      
           
      $requete="SELECT m.marque , m.modele , m.dimensionLongueur
      FROM materiel m WHERE m.id  NOT IN (SELECT e.id FROM emprunt e where e.Date_Fin_Empr is null )
      or m.id not in(SELECT emprunt.id FROM emprunt) ;";
     
      
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
      $i = 0;
      $ligne = $jeuResultat->fetch();
      while($ligne)
      {
          $leMaterielD[$i]['marque']=$ligne->marque;
          $leMaterielD[$i]['modele']=$ligne->modele;
          $leMaterielD[$i]['dimensionLongueur']=$ligne->dimensionLongueur;
          $ligne=$jeuResultat->fetch();
          $i = $i + 1;
      }
  }
  $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  // deconnecterServeurBD($idConnexion);
  return $leMaterielD;

}


function emprunter($idVis, $RefMat,$DateEmprunt, &$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();

 
  $requete="select * from emprunt";
  $requete=$requete." where id = '".$RefMat."';";   
  // Cr�er la requ�te d'ajout 
  $requete="insert into emprunt"
  ."(Vis_id, id, Date_Deb_Empr) values ('"
  .$idVis."','"
  .$RefMat."','"
  .$DateEmprunt."');";
  
  // Lancer la requ�te d'ajout 
  $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
  // Si la requ�te a r�ussi
  if ($ok)
  {
    $message = "L'emprunt a été correctement ajoutée";
    ajouterErreur($tabErr, $message);
    }
  else
  {
    $message = "Attention, l'ajout de l'emprunt a échoué !!!";
    ajouterErreur($tabErr, $message);
  } 
}

function restituer($idVis, $RefMat,$DateResti, &$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();

  
  $requete="select Vis_id, id from emprunt";
  $requete=$requete." where Vis_id = '".$idVis."' and id = '".$RefMat."' and Date_Fin_Empr is null;";   
  // Cr�er la requ�te d'ajout 

  $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

  $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récup�rable sous forme d'objet     
  
  // // // V�rifier que la r�f�rence saisie n'existe pas d�ja
  // $requete="select * from visiteur";
  // $requete=$requete." where Vis_mail = '".$mail."';"; 
  // // echo $requete;
  // $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

  // $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récup�rable sous forme d'objet     
  
  // $ligne = $jeuResultat->fetch();




  $ligne = $jeuResultat->fetch();
  if($ligne)
  {
    $requete="update emprunt"
    ." set Date_Fin_Empr ='"
    .$DateResti."'
    where id = '".$RefMat."'
    and Vis_id = '".$idVis."';";   
    
    // Lancer la requ�te d'ajout 
    $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
    
    // Si la requ�te a r�ussi
    if ($ok)
    {
      $message = "La réstitution a correctement été appliqué ";
      ajouterErreur($tabErr, $message);
      }
    else
    {
      $message = "Attention, la restitution a échoué!!!";
      ajouterErreur($tabErr, $message);
    } 
    
  }
  else
  {
    
    $message="Attention, la restitution a échoué!!!";
    ajouterErreur($tabErr, $message);
  }
}




function listerUti($type_uti)
{
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD � r�ussi
  if (TRUE) 
  {
      
           
      $requete="select id,nom,cat from utilisateur";
      if ($type_uti!="")
      {
          $requete=$requete." where cat='".$type_uti."';";
      }
      
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
      $i = 0;
      $ligne = $jeuResultat->fetch();
      while($ligne)
      {
          $utilisateur[$i]['unId']=$ligne->id;
          $utilisateur[$i]['unNom']=$ligne->nom;
          $utilisateur[$i]['unCat']=$ligne->cat;
         
          $ligne=$jeuResultat->fetch();
          $i = $i + 1;
      }
  }
  $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  // deconnecterServeurBD($idConnexion);
  return $utilisateur;
}


function rechercher($unNom, $unMail)
{
  $levisiteur=array();
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD � r�ussi
  if (TRUE) 
  {  
           
    $requete="select * from visiteur";
    $requete=$requete." where Vis_mail='".$unMail."';";
    //echo $requete;    
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

    $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
    $i = 0;
    $ligne = $jeuResultat->fetch();
    while($ligne)
    {
        $levisiteur[$i]['VIS_NOM']=$ligne->VIS_NOM;
        $levisiteur[$i]['Vis_mail']=$ligne->Vis_mail;
        $ligne=$jeuResultat->fetch();
        $i = $i + 1;
    }
  }
  $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  // deconnecterServeurBD($idConnexion);
  return $levisiteur;
  }

  function rechercherMaterielle($unid, $unmodele)
  {
    $lemateriel=array();
    $connexion = connecterServeurBD();
    
    // Si la connexion au SGBD � r�ussi
    if (TRUE) 
    { 
             
      $requete="select * from materiel";
      $requete=$requete." where id='".$unid."';";
      //echo $requete;    
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
      $i = 0;
      $ligne = $jeuResultat->fetch();
      while($ligne)
      {
         $lemateriel[$i]['id']=$ligne->id;
         $lemateriel[$i]['marque']=$ligne->marque;
          $lemateriel[$i]['modele']=$ligne->modele;
          $ligne=$jeuResultat->fetch();
          $i = $i + 1;
      }
    }
    $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
    // deconnecterServeurBD($idConnexion);
    return $lemateriel;
    }




  function recherchera($idVisiteur)
{
$connexion = connecterServeurBD();
  
  // Si la connexion au SGBD � r�ussi
  if (TRUE) 
  {
      
           
      $requete="select * from visiteur";
      if ($idVisiteur!="")
      {
          $requete=$requete." where Vis_id='".$idVisiteur."';";
      }
      
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
      $i = 0;
      $ligne = $jeuResultat->fetch();
      while($ligne)
      {
          $levisiteur[$i]['Vis_id']=$ligne->Vis_id;
          $levisiteur[$i]['VIS_NOM']=$ligne->VIS_NOM;
          $levisiteur[$i]['Vis_mail']=$ligne->Vis_mail;
          $ligne=$jeuResultat->fetch();
          $i = $i + 1;
      }
  }
  $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  // deconnecterServeurBD($idConnexion);
  return $levisiteur;
}
function rechercheraMateriel($id)
{
$connexion = connecterServeurBD();
  
  // Si la connexion au SGBD � r�ussi
  if (TRUE) 
  {
      
           
      $requete="select * from materiel";
      if ($id!="")
      {
          $requete=$requete." where id='".$id."';";
      }
      
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
      $i = 0;
      $ligne = $jeuResultat->fetch();
      while($ligne)
      {
          $lemateriel[$i]['id']=$ligne->id;
          $lemateriel[$i]['marque']=$ligne->marque;
          $lemateriel[$i]['modele']=$ligne->modele;
          $lemateriel[$i]['dimensionLongueur']=$ligne->dimensionLongueur;
          $ligne=$jeuResultat->fetch();
          $i = $i + 1;
      }
  }
  $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  // deconnecterServeurBD($idConnexion);
  return $lemateriel;
}


//ajouter un visiteur 
function ajouterVisiteur($nom, $mail, &$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD � r�ussi
  if (TRUE) 
  {
    // V�rifier que la r�f�rence saisie n'existe pas d�ja
    $requete="select * from visiteur";
    $requete=$requete." where Vis_mail = '".$mail."';"; 
    // echo $requete;
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

    $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récup�rable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    if($ligne)
    {
      $message="Echec de l'ajout : la référence existe déja !";
      ajouterErreur($tabErr, $message);
    }
    else
    {
      // Créer la requ�te d'ajout 
       $requete="insert into visiteur"
       ."(VIS_NOM,Vis_mail) values ('"
       .$nom."','"
       .$mail."');";
       echo $requete;
       
        // Lancer la requ�te d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
       
        // Si la requ�te a r�ussi
        if ($ok)
        {
          $message = "Le visiteur a été correctement ajoutée";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Attention, l'ajout de le visiteur a échoué !!!";
          ajouterErreur($tabErr, $message);
        } 

    }
    // fermer la connexion
    // deconnecterServeurBD($idConnexion);
  }
  else
  {
    $message = "Problème à la connexion <br />";
    ajouterErreur($tabErr, $message);
  }
}

//ajouter un visiteur 
function ajouterMateriel($uneMarque, $unModel,$uneDimension,&$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD � r�ussi
  if (TRUE) 
  {
    // V�rifier que la r�f�rence saisie n'existe pas d�ja
    $requete="select * from materiel";
    $requete=$requete." where modele = '".$unModel."';"; 
    // echo $requete;
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

    $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récup�rable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    if($ligne)
    {
      $message="Echec de l'ajout : la référence existe déja !";
      ajouterErreur($tabErr, $message);
    }
    else
    {
      // Créer la requ�te d'ajout 
       $requete="insert into materiel"
       ."(marque,modele,dimensionLongueur) values ('"
       .$uneMarque."','"
       .$unModel."','"
        .$uneDimension."');";
      //  echo $requete;
       
        // Lancer la requ�te d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
       
        // Si la requ�te a r�ussi
        if ($ok)
        {
          $message = "Le matériel a été correctement ajoutée";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Attention, l'ajout du materiel a échoué !!!";
          ajouterErreur($tabErr, $message);
        } 

    }
    // fermer la connexion
    // deconnecterServeurBD($idConnexion);
  }
  else
  {
    $message = "Problème à la connexion <br />";
    ajouterErreur($tabErr, $message);
  }
}

function modifierMaterielle($ref, $marque, $dimension, $modele,&$tabErr)
{
  
    // Ouvrir une connexion au serveur mysql en s'identifiant
    $connexion = connecterServeurBD();
    
    // V�rifier que la r�f�rence saisie n'existe pas d�ja
    $requete="select * from materiel";
    $requete=$requete." where id = '".$ref."';";              
   
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    //$jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    // Cr�er la requ�te de modification 
  
    $requete= "UPDATE materiel SET marque = '$marque',
    `modele` = '$modele',
    `dimensionLongueur` = '$dimension'
     WHERE `id`='$ref';";
         
    // Lancer la requ�te d'ajout 
    $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
      
    // Si la requ�te a r�ussi
    if ($ok)
    {
      $message = "Le materiel a été correctement modifier";
      ajouterErreur($tabErr, $message);
    }
    else
    {
      $message = "Attention, la modification du materielle a echoué!!!";
      ajouterErreur($tabErr, $message);
    } 
}

 
function ajouterUti($unmail,$unNom,$unMdp,$unMdpVerif,$unCat,&$tabErr)
{

    // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD � r�ussi
  if (TRUE) 
  {
    if ($unMdpVerif==$unMdp)
    {
              $requete="select * from visiteur";
            $requete=$requete." where vis_mail = '".$unmail."';"; 
            $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

            $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
            
            $ligne = $jeuResultat->fetch();
            if($ligne)
            {
              $message="Echec de l'ajout : l'ID existe déja !";
              ajouterErreur($tabErr, $message);
            }
            else
            {
              // Cr�er la requ�te d'ajout 
              $requete="insert into visiteur"
              ."(vis_mail,VIS_NOM,mdp,cat) values ('"
              .$unmail."','"
              .$unNom."',"
              .$unMdp.",'"
              .$unCat."');";
              
                // Lancer la requ�te d'ajout 
                $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
              
                // Si la requ�te a r�ussi
                if ($ok)
                {
                  $message = "L'utilisateur a été correctement ajoutée";
                  ajouterErreur($tabErr, $message);
                }
                else
                {
                  $message = "Attention, l'ajout de l'utilisateur a échoué";
                  ajouterErreur($tabErr, $message);
                } 

            }
            // fermer la connexion
            // deconnecterServeurBD($idConnexion);
          }
          else
    {
      $message = "Les mdp sont diferents !!!!!! <br />";
    ajouterErreur($tabErr, $message);
    }
        }
    }
   
    // V�rifier que la r�f�rence saisie n'existe pas d�ja
   
//     // V�rifier que la r�f�rence saisie n'existe pas d�ja


function modifierUti($ref, $nom, $prenom, $adresse, $cp, $ville, $sec_code, $lab_code,&$tabErr)
{
  
    // Ouvrir une connexion au serveur mysql en s'identifiant
    $connexion = connecterServeurBD();
    
    // V�rifier que la r�f�rence saisie n'existe pas d�ja
    $requete="select * from visiteur";
    $requete=$requete." where vis_id = '".$ref."';";              
   
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    //$jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    // Cr�er la requ�te de modification 
  
    $requete= "UPDATE visiteur SET vis_adresse = '$adresse',
    `vis_nom` = '$nom',
    `vis_prenom` = '$prenom',
    `vis_cp` = '$cp',
    `vis_ville` = '$ville',
    `sec_code`= '$sec_code',
    `lab_code` = '$lab_code' WHERE `vis_id`='$ref';";
         
    // Lancer la requ�te d'ajout 
    $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
      
    // Si la requ�te a r�ussi
    if ($ok)
    {
      $message = "L'utilisateur a été modifié ";
      ajouterErreur($tabErr, $message);
    }
    else
    {
      $message = "Attention, la modification de l'utilisateur a échoué !!!";
      ajouterErreur($tabErr, $message);
    } 
}



//supprimer uti
function supprimer($id, &$tabErr)
{
    $connexion = connecterServeurBD();
    
    $visiteur = array();
          
    $requete="delete from visiteur";
    $requete=$requete." where Vis_id='".$id."';";
    
    // Lancer la requ�te supprimer
    $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
      
    // Si la requ�te a r�ussi
    if ($ok)
    {
      $message = "Le visiteur a été correctement supprimée";
      ajouterErreur($tabErr, $message);
    }
    else
    {
      $message = "Attention, la suppression du visiteur a échouée !!!";
      ajouterErreur($tabErr, $message);
    }      
}

function supprimerMaterielle($id, &$tabErr)
{
    $connexion = connecterServeurBD();
    
    $visiteur = array();
          
    $requete="delete from materiel";
    $requete=$requete." where id='".$id."';";
    
    // Lancer la requ�te supprimer
    $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
      
    // Si la requ�te a r�ussi
    if ($ok)
    {
      $message = "La materiel a été correctement supprimé";
      ajouterErreur($tabErr, $message);
    }
    else
    {
      $message = "Attention, la suppression du matériel a échouée !!!";
      ajouterErreur($tabErr, $message);
    }      
}

//connexion
function rechercherUtilisateur($log, $psw, &$tabErr)
{
    $connexion = connecterServeurBD();
      
    $requete="select * from visiteur";
      $requete=$requete." where Vis_mail='".$log."' and mdp ='".$psw."';";
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    // Initialisationd e la cat�gorie trouv�e � : "aucune"
    $cat = "nulle";
    
    $ligne = $jeuResultat->fetch();
    
    // Si un utilisateur est trouv�, on initialise une variable cat avec la cat�gorie de cet utilisateur trouv�e dans la table utilisateur
    if ($ligne)
    {
        $cat = $ligne['cat'];
    }
    $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  
  return $cat;
}



?>
