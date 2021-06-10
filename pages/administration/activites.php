<?php

$metatitle = "Panneau admin - Activités";

require ("../elements/header_administration.php");
require ('../functions/administration/activites/activites.php');

?>

<center>
<h3>Ajouter une activité :</h3>
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><input type="text" class="form-control ajoutervalue" aria-describedby="text" placeholder="Nom de l'activité"></h5>
    <a class="btn btn-primary ajouter">Ajouter</a>
    <a class="btn btn-primary ajouter">Ajouter</a>
  </div>
</div>

<br />

<h3>Modifier ou supprimer les activités :</h3>
<table>


  <?php
  $activites = getActivites();
  $i = 0;
  foreach ($activites as $activite) {
    $card_activite = '<div class="card" style="width: 18rem;">
                          <div class="card-body">
                            <h5 class="card-title"><input type="text" class="' . $activite['id'] . ' form-control" id="text" aria-describedby="text" placeholder="' . $activite['name'] . '"></h5>
                            <a id="' . $activite['id'] . '" class="btn btn-primary modifier">Modifier</a>
                            <a id="' . $activite['id'] . '" "href="#" class="btn btn-primary supprimer">Supprimer</a>
                          </div>
                        </div>';
    if ($i == 0) {
      echo "<tr>";
    }
    echo "<th>".$card_activite."</th>";
    if ($i == 3) {
      echo "</tr>";
      $i = -1;
    }
    $i++;
  }

  ?>

</table>
</center>