<?php

$menu = '<div class="topnav">';
$menu .= ($metatitle == "Accueil Allo Ramonage") ? '<a class="active' : '<a class="notactive'; $menu .= ' navlink" href="/">Allo Ramonage</a>';
$menu .= ($metatitle == "Conseils Allo Ramonage") ? '<a class="active' : '<a class="notactive'; $menu .= ' navlink" href="/conseils">Conseils</a>';
$menu .= ($metatitle == "Annuaire Allo Ramonage") ? '<a class="active' : '<a class="notactive'; $menu .= ' navlink" href="/annuaire">Annuaire des ramoneurs</a>';
$menu .= ($metatitle == "Prestations Allo Ramonage") ? '<a class="active' : '<a class="notactive'; $menu .= ' navlink" href="/prestations">Prestations</a>';
$menu .= ($metatitle == "Espace Pro Allo Ramonage") ? '<a class="active' : '<a class="notactive'; $menu .= ' navlink" href="/espace_pro">Espace pro</a>';
$menu .= '</div>';

echo $menu;