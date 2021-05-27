<?php

require("../elements/header_administration.php");
require('../functions/administration/activites.php');

?>

<h3>Ajouter une activité :</h3>
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><input type="text" class="form-control ajoutervalue" id="ajouter" aria-describedby="text" placeholder="Nom de l'activité"></h5>
    <a class="btn btn-primary ajouter">Ajouter</a>
  </div>
</div>
<br />
<h3>Modifier ou supprimer les activités :</h3>

<?php
$activites = getActivites();
foreach ($activites as $activite) {
  $card_activite = '<div class="card" style="width: 18rem;">
                      <div class="card-body">
                        <h5 class="card-title"><input type="text" class="' . $activite['id'] . ' form-control" id="text" name="' . $activite['id'] . '" aria-describedby="text" placeholder="' . $activite['name'] . '"></h5>
                        <a id="' . $activite['id'] . '" class="btn btn-primary modifier">Modifier</a>
                        <a id="' . $activite['id'] . '" "href="#" class="btn btn-primary supprimer">Supprimer</a>
                      </div>
                    </div>';
  echo $card_activite;
  echo '<br />';
}
?>