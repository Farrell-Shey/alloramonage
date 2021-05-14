<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/app.css" type="text/css">
    <title><?php echo $metatitle ?></title>
    <script src="../src/js/app.js"></script>

</head>
<body>
<header id="header">

    <?php // HEADER DESKTOP ?>
    <div class="header-desktop">

        <?php // LOGO SITE ?>
        <a href="/" class="logo_allo">
            <svg viewBox="0 0 86 85" xmlns="http://www.w3.org/2000/svg">
                <rect x="4.5" y="4.5" width="77" height="76" rx="38" stroke="#E55C83" stroke-width="9"></rect>
                <rect x="13" y="13" width="60" height="59" rx="29.5" fill="#E55C83"></rect>
                <path d="M32.9857 26C32.9857 24 35.9857 20.5 37.4857 19V27.5C41.9319 29.5 43.9857 34 44.4857 37C43.5108 38.4623 39.2096 43.251 39.4573 47.1967C39.5488 45.0745 45.0574 40.8805 46.4857 38.5C45.819 36.1667 44.5857 30.8 44.9857 28C46.1857 22.8 50.819 20.5 52.9857 20C51.819 22 49.2857 26.7 48.4857 29.5C48.4857 30.5 51.4857 34.5 53.4857 37C55.4857 39.5 51.4857 48 50.9857 51.5C56.9857 45 55.9857 40 55.4857 37C52.9857 32 53.4857 32 53.4857 29.5C55.8857 25.5 58.4857 24.1667 59.4857 24V34C60.4857 35 62.6857 37.7 63.4857 40.5C64.6857 56.9 53.9857 64.3333 48.4857 66V61C46.9857 62.6667 43.1857 66 39.9857 66C36.7857 66 33.9857 60 32.9857 57L31.4857 62.5C29.4857 60 21.4857 51.5 29.4857 44C38.4857 38.5 36.9857 37.5 36.9857 36.5C38.4857 35.5 32.9857 28.5 32.9857 26Z" fill="white"></path>
                <path d="M26.5 31.5L28.5 23L30 31.5L31 34L30.5 36.5L23 43.5V37.5L26.5 31.5Z" fill="white"></path>
            </svg>
            AlloRamonage
        </a>

        <?php // BURGER MOBILE ?>
        <div class="menu-burger d-sm-none" onclick="document.getElementById('navbar').classList.toggle('d-none');document.getElementById('profile').classList.toggle('d-none');">
                <a href="#" id="menu-trigger" class="menu menu__btn" onclick="this.classList.toggle('is-open');">
                    <span class="menu__burger"></span>
                    <span class=menu__exit></span>
                </a>
        </div>

        <?php // MAIN NAVBAR ?>

        <nav id="navbar" class="navbar d-none d-sm-block">
            <ul>

                <li class="nav-item">
                    <a href="/conseils" class="nav-link">
                        Conseils
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/annuaire" class="nav-link">
                        Annuaires des ramoneurs
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/prestations" class="nav-link active">
                        Prestations
                    </a>
                </li>
            </ul>
        </nav>

        <?php // NAV DESKTOP LEFT ?>
        <div id="profile" class="nav-desktop d-none d-sm-block">
            <div class="mr-1">

                <a class="btn btn-outline-dark btn-lg d-none d-sm-block" onclick="document.getElementById('registration').classList.toggle('d-none');">
                    Espace Pro
                </a>
                <a href="#" class="btn-mobile-pro d-sm-none" onclick="document.getElementById('registration').classList.toggle('d-none');">
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.6665 22.6666L19.3332 16L12.6665 9.33331V22.6666Z" fill="white"></path>
                    </svg>
                    <span>Professionnel ?<br>Connectez-vous</span>
                </a>
            </div>

        </div>


    </div>
</header>

<div id="registration" class="filtre-over d-none" onclick="this.classList.toggle('d-none');">
    <aside class="modal-registration" onclick="document.getElementById('registration').classList.toggle('d-none');">
        <div class="row">

            <?php // CONNEXION ?>
            <div class="col-12 col-md-6 connection">
                <form id="form_login" class="form-connection" method="post" action="/login">
                    <span class="strong-title mb-3">ME CONNECTER</span>

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="mail_login" name="mail_login" placeholder="name@example.com" required>
                        <label for="mail_login">Adresse E-Mail</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password_login" name="password_login" placeholder="*******" required>
                        <label for="password_login">Mot de passe</label>
                    </div>
                    <a href="#" class="oubli">Mot de passe oublié ?</a>

                    <button name="login" id="login" class="btn btn-primary" type="submit">SE CONNECTER</button>
                </form>
            </div>

            <?php // INSCRIPTION ?>
            <div class="col-12 col-md-6 inscription">
                <form class="form-connection" method="post" action="/inscription">
                    <span class="strong-title mb-3">S'INSCRIRE</span>

                    <div class="part_1">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="mail_inscription" name="mail_inscription" placeholder="name@example.com" required>
                            <label for="mail_inscription">Adresse E-Mail</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password_inscription" name="password_inscription" placeholder="*******" required>
                            <label for="password_inscription">Mot de passe</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="confirm_password_inscription" name="confirm_password_inscription" placeholder="*******" required>
                            <label for="confirm_password_inscription">Confirmer le mot de passe</label>
                        </div>
                    </div>

                    <div class="part_2">
                        <span class="title_h2">Informations nécessaires sur l’entreprise</span>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="societe" name="societe" placeholder="societe" required>
                            <label for="societe">Nom de l’entreprise</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" pattern="[0-9]{9}" class="form-control" id="siren" name="siren" placeholder="siren" required>
                            <label for="siren">SIREN</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="adresse" name="adresse" placeholder="adresse" required>
                            <label for="adresse">Adresse de l’entreprise</label>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-floating">
                                    <input type="text" pattern="[0-9]{5}" class="form-control" id="code_postal" name="code_postal" placeholder="code postal" required>
                                    <label for="code_postal">Code postal</label>
                                </div>
                            </div>
                            <div class="col-8" style="padding-left: 20px">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="ville" name="ville" placeholder="ville" required>
                                    <label for="ville">Ville</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-floating">
                            <input type="tel" pattern="[0]{1}[0-9]{9}" class="form-control" id="telephone" name="telephone" placeholder="0000000000" required>
                            <label for="telephone">N° de téléphone (10 chiffres)</label>
                        </div>

                    </div>
                    <button name="inscription" id="inscription" class="btn btn-outline-primary" type="submit">FINALISER MON INSCRIPTION</button>

                </form>
            </div>
        </div>
    </aside>
</div>

<main>
</main>
</html>