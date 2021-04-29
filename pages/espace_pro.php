<?php

$metatitle = "Espace Pro Allo Ramonage";

$menu = require($_SERVER['DOCUMENT_ROOT'] . "/src/menu.php");

if (isset($_SESSION['utilisateur'])) {
    echo '
    <form method="post" action="/logout">
        <input type="submit" value="Déconnexion" name="but_logout">
    </form>
    ';
} else {
    echo '
    <div class="container">
    <form id="form_login" method="post" action="/login"">
        <div id="div_login">
            <div>
                <input type="text" class="textbox" id="email" name="email" placeholder="E-mail" />
            </div>
            <div>
                <input type="password" class="textbox" id="password" name="password" placeholder="Mot de passe"/>
            </div>
            <div>
                <input type="submit" value="Se connecter" name="but_submit" id="but_submit" />
            </div>
        </div>
    </form>
    </div>
    ';

    echo '<br><br>';

    echo '
    <form method="post" id="inscription" action="/espace_pro">

        <input name="email" id="email" placeholder="E-mail" type="email" required>
        <div id="texte_erreur_email"></div>
        <input name="mot_de_passe" id="mot_de_passe" placeholder="Mot de passe" type="password">

        <input name="mot_de_passe_verif" id="mot_de_passe_verif" placeholder="Veuillez retapez votre mot de passe" type="password">
        <div id="texte_erreur_mdp"></div>

        <input name="nom_entreprise" id="nom_entreprise" placeholder="Nom de l\'entreprise" type="text">

        <input name="siren" id="siren" placeholder="SIREN" type="text">

        <input name="adresse" id="adresse" placeholder="Adresse de l\'entreprise" type="text">

        <input name="code_postal" id="code_postal" placeholder="Code postal" type="text">
        
        <input name="ville" id="ville" placeholder="Ville" type="text">
    
        <input name="telephone" id="telephone" placeholder="N° de téléphone" type="text">
    
        <input type="submit" value="S\'inscrire" />
        
    </form>
    ';
}
