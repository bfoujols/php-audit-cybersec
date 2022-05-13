<div class="container">

<form name="formEmprunter" action="" method="post" onSubmit="return valider()">
  <fieldset>
    <legend>Entrer les infos sur le materiel à emprunter</legend>
    <label>ID Visiteur :</label> <input type="text" name="idVis" size="10" /><br />
    <label>Ref materiel :</label> <input type="text" name="RefMat" size="10" /><br />
    <label>Date de début de l'emprunt :</label> <input type="date" name="DateEmprunt" size="10" /><br />
  </fieldset>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <button type="reset" class="btn">Annuler</button>
  <p>
</form>