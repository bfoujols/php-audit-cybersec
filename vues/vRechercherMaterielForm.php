<!--Formulaire de recherche � partir du nom-->

<div class="container">
  <form class="form-search" action="" method=post>
    <legend>Entrez la designation du materièle à recherché </legend>
    <div class="input-append">
      <label>ID : </label> <input type="text" name="id" size="20" /><br />
      <br>
      <label>Modèle : </label> <input type="text" name="modele" size="20" />
      <br>
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
    if (isset($unid))
    {
?>
        <h3><?php echo $unid;?></h3>
<?php    
    }
?>
      </caption>
      <thead>
        <tr>
          <th>ID</th>
          <th>Marque</th>
          <th>Modele</th>
        </tr>
      </thead>
      <tbody>  
<?php
    $i = 0;
    while($i < count($lemateriel))
    { 
 ?>     
        <tr>
            <td><?php echo $lemateriel[$i]["id"]?></td>
            <td><?php echo $lemateriel[$i]["marque"]?></td>
            <td><?php echo $lemateriel[$i]["modele"]?></td>
        </tr>
<?php
        $i = $i + 1;
     }
?>       
       </tbody>       
     </table>    
  </div>

 


 

