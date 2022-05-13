

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

 
