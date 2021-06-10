<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/app.css" type="text/css">
    <title><?php echo $metatitle ?></title>
    <script src="/assets/js/app.js"></script>
</head>
<body>
<header id="header">

    <?php // HEADER DESKTOP ?>
    <div class="header-desktop" style="position: unset !important;">

        <?php // LOGO SITE ?>
        <a href="/" class="logo_allo">
            <svg viewBox="0 0 86 85" xmlns="http://www.w3.org/2000/svg">
                <rect x="4.5" y="4.5" width="77" height="76" rx="38" stroke="#E55C83" stroke-width="9"></rect>
                <rect x="13" y="13" width="60" height="59" rx="29.5" fill="#E55C83"></rect>
                <path d="M32.9857 26C32.9857 24 35.9857 20.5 37.4857 19V27.5C41.9319 29.5 43.9857 34 44.4857 37C43.5108 38.4623 39.2096 43.251 39.4573 47.1967C39.5488 45.0745 45.0574 40.8805 46.4857 38.5C45.819 36.1667 44.5857 30.8 44.9857 28C46.1857 22.8 50.819 20.5 52.9857 20C51.819 22 49.2857 26.7 48.4857 29.5C48.4857 30.5 51.4857 34.5 53.4857 37C55.4857 39.5 51.4857 48 50.9857 51.5C56.9857 45 55.9857 40 55.4857 37C52.9857 32 53.4857 32 53.4857 29.5C55.8857 25.5 58.4857 24.1667 59.4857 24V34C60.4857 35 62.6857 37.7 63.4857 40.5C64.6857 56.9 53.9857 64.3333 48.4857 66V61C46.9857 62.6667 43.1857 66 39.9857 66C36.7857 66 33.9857 60 32.9857 57L31.4857 62.5C29.4857 60 21.4857 51.5 29.4857 44C38.4857 38.5 36.9857 37.5 36.9857 36.5C38.4857 35.5 32.9857 28.5 32.9857 26Z" fill="white"></path>
                <path d="M26.5 31.5L28.5 23L30 31.5L31 34L30.5 36.5L23 43.5V37.5L26.5 31.5Z" fill="white"></path>
            </svg>
            Espace Administrateur
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
                    <a href="/administration" class="nav-link">
                        Revendeurs
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/administration/activites" class="nav-link">
                        Activités
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/administration/commentaires_a_valider" class="nav-link active">
                        Commentaires à valider
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/administration/commentaires_valides" class="nav-link active">
                        Commentaires validés
                    </a>
                </li>
            </ul>
        </nav>

    </div>
</header>