<div class="container">

<form name="formRestituer" action="" method="post" onSubmit="return valider()">
  <fieldset>
    <legend>Entrer les infos sur le materiel à Restituer</legend>
    <label>ID Visiteur :</label> <input type="text" name="idVis" size="10" /><br />
    <label>Ref materiel :</label> <input type="text" name="RefMat" size="10" /><br />
    <label>Date de Restitution :</label> <input type="date" name="DateResti" size="10" /><br />
  </fieldset>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <button type="reset" class="btn">Annuler</button>
  <p>
</form>