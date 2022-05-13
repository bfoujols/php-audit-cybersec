<script type="text/javascript">
//<![CDATA[

function valider(){
 frm=document.forms['formAjout'];
  // si le prix est positif
  if(frm.elements['dimensionL'].value >0) {
    // les donn�es sont ok, on peut envoyer le formulaire    
    return true;
  }
  else {
    // sinon on affiche un message
    alert("La dimension doit étre positif !");
    // et on indique de ne pas envoyer le formulaire
    return false;
  }
}
//]]>
</script>

<!--Saisie des informations dans un formulaire!-->
<div class="container">

<form name="formAjoutMateriel" action="" method="post" onSubmit="return valider()">
  <fieldset>
    <legend>Entrez les données sur le materiel à ajouter </legend>
    <label>Marque :</label> <input type="text" name="marque" size="10" /><br />
    <label>Model :</label> <input type="text" name="model" size="10" /><br>
    <label>Dimension Longueur :</label> <input type="text" name="dimensionL" size="10" /><br>
    <!-- <label>Mot de passe :</label> <input type="text" name="mdp" size="20" /><br>    -->
  </fieldset>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <button type="reset" class="btn">Annuler</button>
  <p>
</form>
</div>


