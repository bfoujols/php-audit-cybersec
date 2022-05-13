<!--Formulaire de recherche � partir du nom-->

<div class="container">
  <form class="form-search" action="" method=post>
    <legend>Entrez la designation du visiteur recherché </legend>
    <div class="input-append">
      <label>Nom :</label> <input type="text" name="VIS_NOM" size="20" /><br />
      <br>
      <label>Mail  :</label> <input type="text" name="Vis_mail" size="20" /><br />
      <br>
      <button type="submit" class="btn btn-primary">Rechercher</button>
    </div>
  </form>
</div>





<!-- Affichage des informations sur les visiteurs-->

<div class="container">

    <table class="table table-bordered table-striped table-condensed">
      <caption>
<?php
    if (isset($unMail))
    {
?>
        <h3><?php echo $unMail;?></h3>
<?php    
    }
?>
      </caption>
      <thead>
        <tr>
          <th>Nom</th>
          <th>Mail</th>
        </tr>
      </thead>
      <tbody>  
<?php
    $i = 0;
    while($i < count($levisiteur))
    { 
 ?>     
        <tr>
            <td><?php echo $levisiteur[$i]["VIS_NOM"]?></td>
            <td><?php echo $levisiteur[$i]["Vis_mail"]?></td>
        </tr>
<?php
        $i = $i + 1;
     }
?>       
       </tbody>       
     </table>    
  </div>

 


 

