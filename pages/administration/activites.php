<?php

require ("../elements/header_administration.php");
require ('../functions/administration/activites.php');

// $activites = getActivites();
// $result = "<select>";
// echo count($activites);
// foreach($activites as $activite){
//     echo $activite[1];
// }
// while ($activite = $activites->fetch()) {
//     $result.= "<option>".$activite['id']."</option>";
// }
// $result .= "</select>";
// echo $result;
?>

<a class="btn btn-outline-dark btn-lg d-none d-sm-block" onclick="document.getElementById('registration').classList.toggle('d-none');">
                    Espace Pro
</a>

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"></h5>
    <a href="#" class="card-link">Modifier</a>
    <a href="#" class="card-link">Supprimer</a>
  </div>
</div>
