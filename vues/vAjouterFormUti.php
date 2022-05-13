<script type="text/javascript">
//<![CDATA[

// function valider(){
//  frm=document.forms['formAjout'];
//   // si le prix est positif
//   if(frm.elements['prix'].value >0) {
//     // les donn�es sont ok, on peut envoyer le formulaire    
//     return true;
//   }
//   else {
//     // sinon on affiche un message
//     alert("Le prix doit �tre positif !");
//     // et on indique de ne pas envoyer le formulaire
//     return false;
//   }
// }
//]]>
</script>

<!--Saisie des informations dans un formulaire!-->
<div class="container">

<form name="formAjoutUti" action="" method="post" onSubmit="return valider()">
  <fieldset>
    <legend>Entrez vos coordonnées pour l'inscription</legend>
    <label>Mail : </label> <input type="text" placeholder="Entrer un Mail "name="mail" size="20" /><br />
    <label>Nom :</label> <input type="text" name="nom" size="20" /><br />
    <label>Mot de passe :</label> <input type="password" name="mdp" size="10" /><br /> 
    <label>Confirmer le mot de passe :</label> <input type="password" name="mdpVerif" size="10" /><br /> 
    <label>Catégorie :</label>
    <select name="cat">
       <option selected value = "admin">Admin</option>
       <option value = "client">Client</option>
      
    </select> 
  </fieldset>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <button type="reset" class="btn">Annuler</button>
  <p />
</form>
</div>


