
  <!-- Navbar
    ================================================== -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active">
                <a href="./indexzz.php">Accueil</a>
              </li>
              
              <!-- <li class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#">Visiteur <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                      <li><a href="lister.php">Lister</a></li>
                      <li><a href="ajouterUti.php">Ajouter</a></li>
                      <li><a href="supprimer.php">Supprimer</a></li>
                      <li><a href="rechercher.php">Rechercher</a></li>
                      <li><a href="modifierUti.php">Modifier</a></li>
                  </ul>
              </li> -->
             
             
             


              <?php

              // Si session administrateur
              if (estVisiteurConnecte())
              {

                ?>

              <li class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#">Emprunt <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                      <li><a href="emprunter.php">Faire un emprunt</a></li>
                      <li><a href="restituer.php">Restituer</a></li>
                      <li><a href="listerMaterielDispo.php">Liste disponible</a></li>
                     
                  </ul>
              </li>
              <li class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#">Visiteur <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                      <li><a href="lister.php">Lister</a></li>
                      
                      <li><a href="rechercher.php">Rechercher</a></li>
                    
                  </ul>
              </li>
              <li class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#">Matériel <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                     
                     
                      <li><a href="rechercherMateriel.php">Rechercher</a></li>
                     
                  </ul>
              </li>
              <li class="nav">
                 <a href="deconnecter.php" >Deconnecter</a> 
              </li>
              <?php
                }

                    if ( estAdministrateurConnecte())
                    {
                      ?>
                       <li class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#">Matériel <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                     
                      <li><a href="ajouterMateriel.php">Ajouter</a></li>
                      <li><a href="supprimerMaterielle.php">Supprimer</a></li>
                      <li><a href="rechercherMateriel.php">Rechercher</a></li>
                      <li><a href="modifierMateriel.php">Modifier</a></li>
                  </ul>
              </li>
              <li class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#">Visiteur <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                      <li><a href="lister.php">Lister</a></li>
                      <li><a href="ajouterUti.php">Ajouter</a></li>
                      <li><a href="supprimer.php">Supprimer</a></li>
                      <li><a href="rechercher.php">Rechercher</a></li>
                      <li><a href="modifierUti.php">Modifier</a></li>
                  </ul>
              </li>
              <li class="nav">
                 <a href="deconnecter.php" >Deconnecter</a> 
              </li>
              











                <?php
                }

                // Si aucune connection n'est en cours, proposer l'inscription et l'identification
                if (!estConnecte())
                {
                ?>
                 <li class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#">Identification <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                      
                      <li><a href="ajouterUti.php">Inscription</a></li>
                      <li><a href="connecter.php">Connexion</a></li>
                     
                  </ul>
              </li>

              <?php
              }   
              ?> 




<!--                                          
              <li class="nav">
                <a href="lister.php?categ=bul">Bulbes</a>
              </li>
              <li class="nav">
                <a href="lister.php?categ=ros">Rosiers</a>
              </li>
              <li class="nav">
                <a href="lister.php?categ=mas">Massifs</a>
              </li> -->
            </ul>
          </div>
        </div>
      </div>
    </div>
</div>

