

<!-- Affichage des informations sur les visiteurs-->

<div class="container">

    <table class="table table-bordered table-striped table-condensed">
      <caption>
<?php
    if (isset($cat))
    {
?>
        <h3><?php echo $cat;?></h3>
<?php    
    }
?>
      </caption>
      <thead>
        <tr>
          <th>Marque</th>
          <th>Model</th>
          <th>Dimension</th>
        </tr>
      </thead>
      <tbody>  
<?php
    $i = 0;
    while($i < count($leMateriel))
    { 
 ?>     
        <tr>
            <td><?php echo $leMateriel[$i]["marque"]?></td>
            <td><?php echo $leMateriel[$i]["modele"]?></td>
            <td><?php echo $leMateriel[$i]["dimensionLongueur"]?></td>
        </tr>
<?php
        $i = $i + 1;
     }
?>       
       </tbody>       
     </table>    
  </div>

 
