<?php

$metatitle = 'Ramonage: l\'annuaire des ramoneurs AlloRamonage.fr';
$metadesc = 'Toute les infos pour le ramonage de votre installation de chauffage au bois (cheminée - poele a bois- chaudiere) et les adresses de ramoneurs près de chez vous avec les avis de leurs clients. Pour un ramonage en toute sécutité.';

require ("../elements/header.php");

?>

<section class="home-jumbotron" style="background-image: url('/assets/img/bg_home.jpg')">
    <div class="filter-black">
        <div class="container">
            <h1 class="title_h1">Trouvez un ramoneur<br>près de chez vous & comparez</h1>

            <?php include '../elements/search-bar.php'?>

        </div>
    </div>
</section>
<section class="container">
    <h2 class="title_h2">Pourquoi faire appel à un ramoneur ?</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam asperiores consectetur deserunt, enim esse eveniet expedita, explicabo hic laboriosam laudantium minus modi possimus provident ratione reprehenderit similique veniam voluptatibus. Accusamus commodi consectetur dolore expedita hic ipsam numquam ratione recusandae rem repellendus. At distinctio maiores quae quos. Beatae harum nobis ratione.</p>
<a class="btn btn-outline-primary btn-lg">Lire la suite ></a>
</section>
<section class="redirection">
    <h2>Vous cherchez ...</h2>
    <div class="row">
        <a href="poeles.net" class="col-sm-6">
            <span class="poele-net">UN POELE ?</span>
        </a>
        <a href="poeles.net" class="col-sm-6">
            <span class="bois-de-chauffage">DU BOIS ?</span>
        </a>
    </div>
</section>

<?php

require ("../elements/footer.php");