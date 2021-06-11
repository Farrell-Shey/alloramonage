<?php

require("../elements/header_administration.php");
require('../functions/administration/commentaires_a_valider.php');

$commentaires = getCommentairesAValider();

if ($commentaires == null) {
    echo "Aucun commentaires à valider.";
}

$tableau = '<table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Commentaire</th>
                        <th scope="col">Date</th>
                        <th scope="col">Utilisateur</th>
                    </tr>
                </thead>
                <tbody>';

foreach ($commentaires as $commentaire) {
    print_r($commentaire);
}

?>


<tr>
    <th scope="row">1</th>
    <td>Mark</td>
    <td>Otto</td>
    <td>@mdo</td>
</tr>
<tr>
    <th scope="row">2</th>
    <td>Jacob</td>
    <td>Thornton</td>
    <td>@fat</td>
</tr>
<tr>
    <th scope="row">3</th>
    <td>Larry</td>
    <td>the Bird</td>
    <td>@twitter</td>
</tr>
</tbody>
</table>