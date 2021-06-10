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
            <th scope="col">Département</th>
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
            $tableau .= '<th>' . $revendeur['code_postal'] . '</th>';
            $tableau .= '<th><button type="button" class="btn btn-primary modification" id="' . $revendeur['id'] . '" onclick="document.getElementById(\'registration\').classList.toggle(\'d-none\');">Modifier</button></th>';
            $tableau .= '</tr>';
        }
        echo $tableau;
        ?>
    </tbody>
</table>

<div id="registration" class="filtre-over d-none" onclick="this.classList.toggle('d-none');">
    <aside class="modal-registration" onclick="document.getElementById('registration').classList.toggle('d-none');">
        <div class="row">

            <?php // CONNEXION ?>
            <div class="col-12 col-md-6 connection">
                <form id="form_login" class="form-connection" method="post" action="/login">
                    <span class="strong-title mb-3">ME CONNECTER</span>

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="mail_login" name="mail_login" placeholder="name@example.com" required>
                        <label for="mail_login">ID</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password_login" name="password_login" placeholder="*******" required>
                        <label for="password_login">Date</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password_login" name="password_login" placeholder="*******" required>
                        <label for="password_login">Date du boost de la position</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password_login" name="password_login" placeholder="*******" required>
                        <label for="password_login">Statut</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password_login" name="password_login" placeholder="*******" required>
                        <label for="password_login">A payé</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password_login" name="password_login" placeholder="*******" required>
                        <label for="password_login">Top position</label>
                    </div>
                </form>
            </div>

            <?php // INSCRIPTION ?>
            <div class="col-12 col-md-6 inscription">
                <form class="form-connection" method="post" action="/inscription">
                    <span class="strong-title mb-3">S'INSCRIRE</span>

                    <div class="part_1">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="mail_inscription" name="mail_inscription" placeholder="name@example.com" required>
                            <label for="mail_inscription">Boost position</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password_inscription" name="password_inscription" placeholder="*******" required>
                            <label for="password_inscription">Motif refus</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="confirm_password_inscription" name="confirm_password_inscription" placeholder="*******" required>
                            <label for="confirm_password_inscription">Société</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="confirm_password_inscription" name="confirm_password_inscription" placeholder="*******" required>
                            <label for="confirm_password_inscription">Contact</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="confirm_password_inscription" name="confirm_password_inscription" placeholder="*******" required>
                            <label for="confirm_password_inscription">Adresse</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="confirm_password_inscription" name="confirm_password_inscription" placeholder="*******" required>
                            <label for="confirm_password_inscription">Code Postal</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="confirm_password_inscription" name="confirm_password_inscription" placeholder="*******" required>
                            <label for="confirm_password_inscription">Ville</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="confirm_password_inscription" name="confirm_password_inscription" placeholder="*******" required>
                            <label for="confirm_password_inscription">Pays</label>
                        </div>

                    </div>

                    <div class="part_2">
                        <span class="title_h2">Informations nécessaires sur l’entreprise</span>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="societe" name="societe" placeholder="societe" required>
                            <label for="societe">Téléphone</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" pattern="[0-9]{9}" class="form-control" id="siren" name="siren" placeholder="siren" required>
                            <label for="siren">Fax</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="adresse" name="adresse" placeholder="adresse" required>
                            <label for="adresse">E-mail</label>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-floating">
                                    <input type="text" pattern="[0-9]{5}" class="form-control" id="code_postal" name="code_postal" placeholder="code postal" required>
                                    <label for="code_postal">URL</label>
                                </div>
                            </div>
                            <div class="col-8" style="padding-left: 20px">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="ville" name="ville" placeholder="ville" required>
                                    <label for="ville">Tarif</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-floating">
                            <input type="tel" pattern="[0]{1}[0-9]{9}" class="form-control" id="telephone" name="telephone" placeholder="0000000000" required>
                            <label for="telephone">Description</label>
                        </div>

                    </div>

                    <div class="part_2">
                        <span class="title_h2">Informations nécessaires sur l’entreprise</span>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="societe" name="societe" placeholder="societe" required>
                            <label for="societe">Certificat délivré</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" pattern="[0-9]{9}" class="form-control" id="siren" name="siren" placeholder="siren" required>
                            <label for="siren">Activités</label>
                        </div>
                    

                    </div>
                    <button name="inscription" id="inscription" class="btn btn-outline-primary" type="submit">FINALISER MON INSCRIPTION</button>
                </form>
            </div>
        </div>
    </aside>
</div>