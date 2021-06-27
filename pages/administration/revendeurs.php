<?php

$metatitle = "Revendeurs";

require("../elements/header_administration.php");
require('../functions/administration/revendeurs/revendeurs.php');

?>

<br>
<button type="button" class="btn btn-primary changement_revendeurs" value="10">Payant</button>
<button type="button" class="btn btn-primary changement_revendeurs" value="1">Validé</button>
<button type="button" class="btn btn-primary changement_revendeurs" value="0">À valider</button>
<button type="button" class="btn btn-primary changement_revendeurs" value="2">En attente</button>
<button type="button" class="btn btn-primary changement_revendeurs" value="9">Supprimé</button>
<br><br>

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Société</th>
            <th scope="col">Email</th>
            <th scope="col">Téléphone</th>
            <th scope="col">Code Postal</th>
            <th scope="col">Date de création</th>
            <th scope="col">Statut</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody id="revendeurs">
        <?php
        $revendeurs = getRevendeurs();
        $tableau = null;
        foreach ($revendeurs as $revendeur) {
            $tableau .= '<tr>';
            $tableau .= '<th scope="row">' . $revendeur['id'] . '</th>';
            $tableau .= '<th>' . $revendeur['societe'] . '</th>';
            $tableau .= '<th>' . $revendeur['email'] . '</th>';
            $tableau .= '<th>' . $revendeur['tel'] . '</th>';
            $tableau .= '<th>' . $revendeur['code_postal'] . '</th>';
            $tableau .= '<th>' . $revendeur['created_at'] . '</th>';
            $tableau .= '<th>' . $revendeur['statut'] . '</th>';
            $tableau .= '<th><button type="button" class="btn btn-primary modification_revendeurs" id="' . $revendeur['id'] . '" onclick="document.getElementById(\'registration\').classList.toggle(\'d-none\');">Modifier</button></th>';
            $tableau .= '</tr>';
        }
        echo $tableau;
        ?>
    </tbody>
</table>

<div id="registration" class="filtre-over d-none" onclick="this.classList.toggle('d-none');">
    <aside class="modal-registration" onclick="document.getElementById('registration').classList.toggle('d-none');">
        <div class="row">

            <div class="col-12 col-md-6 connection">
                <form id="form_login" class="form-connection" method="post" action="/login">
                    <!-- <span class="strong-title mb-3">ME CONNECTER</span> -->
                    <div class="row">
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input class="form-control" id="id_revendeur" name="id_revendeur" placeholder="0" readonly>
                                <label for="id_revendeur">ID</label>
                            </div>
                        </div>
                        <div class="col-6" style="padding-left: 20px">
                            <select class="form-select" id="statut_revendeur" name="statut_revendeur">
                                <option id="valide" value="1">Validé</option>
                                <option id="payant" value="10">Payant</option>
                                <option id="avalider" value="0">À valider</option>
                                <option id="attente" value="2">En attente</option>
                                <option id="supprime" value="9">Supprimé</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input class="form-control" id="date_revendeur" name="date_revendeur" placeholder="2020-01-01 12:00:00" readonly>
                                <label for="date_revendeur">Date</label>
                            </div>
                        </div>
                        <div class="col-6" style="padding-left: 20px">
                            <div class="form-floating mb-3">
                                <input class="form-control" id="date_boost_revendeur" name="date_boost_revendeur" placeholder="0000-00-00 00:00:00" required>
                                <label for="date_boost_revendeur">Date du boost de la position</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input class="form-control" id="top_position_revendeur" name="top_position_revendeur" placeholder="21, 22, 23" required>
                                <label for="top_position_revendeur">Top position</label>
                            </div>
                        </div>
                        <div class="col-6" style="padding-left: 20px">
                            <div class="form-floating mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="a_paye_revendeur" name="a_paye_revendeur">
                                    <label class="form-check-label" for="a_paye_revendeur">A payé</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="boost_position_revendeur" name="boost_position_revendeur">
                                    <label class="form-check-label" for="boost_position_revendeur">Boost position</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="refus_revendeur" name="refus_revendeur" rows="4" placeholder="Motif refus"></textarea>
                        <label for="refus_revendeur">Motif refus</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="societe_revendeur" name="societe_renvendeur" placeholder="Nom société" required>
                        <label for="societe_renvendeur">Société</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="siren_revendeur" name="siren_revendeur" placeholder="Siren" required>
                        <label for="siren_revendeur">Siren</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="contact_revendeur" name="contact_revendeur" placeholder="Nom revendeur" required>
                        <label for="contact_revendeur">Contact</label>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input class="form-control" id="ville_revendeur" name="ville_revendeur" placeholder="Ville revendeur" required>
                                <label for="ville_revendeur">Ville</label>
                            </div>
                        </div>
                        <div class="col-6" style="padding-left: 20px">
                            <div class="form-floating mb-3">
                                <input class="form-control" id="code_postal_revendeur" name="code_postal_revendeur" placeholder="00000" required>
                                <label for="code_postal_revendeur">Code Postal</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-12 col-md-6 inscription">
                <form class="form-connection" method="post" action="/inscription">
                    <!-- <span class="strong-title mb-3">S'INSCRIRE</span> -->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="adresse_revendeur" name="adresse_revendeur" placeholder="Adresse revendeur" required>
                        <label for="adresse_revendeur">Adresse</label>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input class="form-control" id="pays_revendeur" name="pays_revendeur" placeholder="Pays revendeur" required>
                                <label for="pays_revendeur">Pays</label>
                            </div>
                        </div>
                        <div class="col-6" style="padding-left: 20px">
                            <div class="form-floating mb-3">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="telephone_revendeur" name="telephone_revendeur" placeholder="0000000000" required>
                                    <label for="telephone_revendeur">Téléphone</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="email_revendeur" name="email_revendeur" placeholder="name@example.com" required>
                                <label for="email_revendeur">E-mail</label>
                            </div>
                        </div>
                        <div class="col-6" style="padding-left: 20px">
                            <div class="form-floating mb-3">
                                <input class="form-control" id="url_revendeur" name="url_revendeur" placeholder="example.com" required>
                                <label for="url_revendeur">URL</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input class="form-control" id="tarif_revendeur" name="tarif_revendeur" placeholder="000" required>
                                <label for="tarif_revendeur">Tarif</label>
                            </div>
                        </div>
                        <div class="col-6" style="padding-left: 20px">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="certificat_revendeur" name="certificat_revendeur">
                                <label class="form-check-label" for="certificat_revendeur">Certificat</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="costic_revendeur" name="costic_revendeur">
                                <label class="form-check-label" for="costic_revendeur">Costic</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="description_revendeur" name="description_revendeur" rows="4" placeholder="Description revendeur"></textarea>
                        <label for="description_revendeur">Description</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="activites_revendeurs" name="activites_revendeurs" placeholder="Activités revendeur" required>
                        <label for="activites_revendeurs">Activités</label>
                    </div>

                    <button name="inscription" id="inscription" class="btn btn-outline-primary sauvegarde_modifications" type="submit">ENREGISTRER LES MODIFICATIONS</button>

                </form>
            </div>
        </div>
    </aside>
</div>