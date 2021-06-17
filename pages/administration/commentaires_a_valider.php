<?php

require("../elements/header_administration.php");
require('../functions/administration/commentaires/commentaires.php');

$commentaires = getCommentairesAValider();

if(!$commentaires) {
    echo "Il n'y a aucun commentaire à traiter pour le moment.";
}
?>

<?php if ($commentaires) : ?>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom et prénom</th>
                <th scope="col">Commentaire</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody id="revendeurs">
            <?php
            $tableau = null;
            foreach ($commentaires as $commentaire) {
                $tableau .= '<tr>';
                $tableau .= '<th scope="row">' . $commentaire['id'] . '</th>';
                $tableau .= '<th>' . $commentaire['nom'] . " " . $commentaire['prenom'] . '</th>';
                $tableau .= '<th>' . $commentaire['commentaire'] . '</th>';
                $tableau .= '<th><button type="button" class="btn btn-primary validation_commentaire" id="' . $commentaire['id'] . '">Valider</button><span> </span><button type="button" class="btn btn-primary suppression_commentaire" id="' . $commentaire['id'] . '">Supprimer</button></th>';
                $tableau .= '</tr>';
            }
            echo $tableau;
            ?>
        </tbody>
    </table>

<?php endif; ?>