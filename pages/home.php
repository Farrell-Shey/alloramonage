<?php

$metatitle = 'Ramonage: l\'annuaire des ramoneurs AlloRamonage.fr';
$metadesc = 'Toute les infos pour le ramonage de votre installation de chauffage au bois (cheminée - poele a bois- chaudiere) et les adresses de ramoneurs près de chez vous avec les avis de leurs clients. Pour un ramonage en toute sécutité.';

require("../elements/header.php");

?>

    <section class="home-jumbotron" style="background-image: url('/assets/img/bg_home.jpg')">
        <div class="filter-black">
            <div class="container">
                <h1 class="title_h1">Trouvez un ramoneur<br>près de chez vous & comparez</h1>

                <?php include '../elements/search-bar.php' ?>

            </div>
        </div>
    </section>

<?php /**
 * TEXT POUR LE REFERENCEMENT
 */ ?>
    <section class="presentation">
        <div class="container-home">
            <p>
                AlloRamonage.fr est un annuaire des sociétés spécialisées dans le ramonage et l'entretien des
                installations
                de chauffage.
                Indiquez où vous vous trouvez et le type d'appareil à ramoner ou à entretenir (cheminée insert ou foyer,
                poele bois ou poêle granulés, chaudière),
                nous vous indiquerons quel professionnel peut vous rendre service. A vous de comparer et de le contacter
                !
            </p>
            <a class="btn btn-outline-primary btn-lg" onclick="document.getElementById('registration').classList.toggle('d-none');">Professionnels, inscrivez-vous ici</a>
        </div>
    </section>

<?php /**
 * REASSURANCE
 */ ?>
    <section class="reassurance">
        <div>
            <img src="assets/img/medal.svg" alt="La crème des ramoneurs pour vos travaux de ramonage">

            <span class="title">Expertise</span>
            <p>Uniquement des professionnels</p>
        </div>
        <div>
            <img src="assets/img/expertise.svg" alt="l'expertise d'un professionnel pour vos travaux de ramonage">
            <span class="title">Transparence</span>
            <p>Prix, diplôme, certificat ?<br>Le professionnel s'engage</p>
        </div>
        <div>
            <img src="assets/img/choix.svg" alt="Une large gamme de choix avec notre annuaire">
            <span class="title">Choix</span>
            <p>Plus de 900 professionnels disponibles<br>Contactez-les directement !</p>
        </div>
    </section>

<?php /**
 * FAQ
 */ ?>

    <section class="questions">
        <div class="container-home">

            <span class="title_h2">Vos questions</span>
            <div class="owl-carousel">
                <article>
                    <h2 class="title">Comment choisir le bon ramoneur ?</h2>
                    <p>
                        - Préférez un ramoneur certifié (sur sa fiche, la société de ramonage indique si le ramoneur est
                        certifié)
                        ou
                        avec une longue expérience (qui vaut certification aux yeux de la règlementation).
                    </p>
                    <p>
                        - Un certificat de ramonage doit être fourni (la fiche de la société indique si le ramoneur
                        fournit
                        ce
                        document).<br/><br/>-
                        Interrogez le sur les critères qui vous semblent importants. Pour certains c&#x27;est le prix,
                        pour
                        d&#x27;autres
                        c&#x27;est la rapidité d&#x27;intervention ou le niveau de propreté, ou encore la possibilité de
                        réaliser d&#x27;autres
                        prestations comme l&#x27;entretien...ou tout simplement la sympathie !
                    </p>
                </article>
                <article>
                    <h2 class="title">Est-ce que le ramonage est obligatoire ?</h2>
                    <p>
                        Oui il est rendu obligatoire par le Règlement sanitaire départemental (risque peu probable d&#x27;amende
                        de
                        troisième classe de 450€ par le règlement sanitaire de votre département). Il est aussi rendu de
                        fait
                        obligatoire par les assurances qui peuvent l&#x27;exiger en cas de sinistre/incendie (l&#x27;assureur
                        peut
                        se
                        défausser si la cause de l&#x27;incendie est attribuée à un défaut d&#x27;entretien).
                    </p>
                </article>
                <article>
                    <h2 class="title">Faut-il faire ramoner sa cheminée tous ans ?</h2>
                    <p>
                        Le conduit toit être ramoné 2 fois par an.<br/>Et le ramonage &quot;chimique&quot; avec un bûche
                        n&#x27;est
                        pas
                        pris en compte dans ce calcul car peu efficace.
                    </p>
                </article>
                <article>
                    <h2 class="title">Puis-je ramoner moi-même ?</h2>
                    <p>
                        Vous pouvez le faire vous même et vous pourrez acheter des outils adaptés (quoique basiques) un
                        peu
                        partout.
                    </p>
                    <p>
                        Sachez 2 choses cependant :<br/>- le ramonage ne consiste pas seulement à nettoyer les conduits
                        : le
                        ramoneur a
                        aussi un devoir de contrôle pour vérifier que l&#x27;installation est aux normes et
                        fonctionnelle
                        (vacuité
                        des
                        conduits). Savez-vous relever un problème de tirage, de distance de sécurité ou tout écart au
                        DTU
                        24.1
                        ?<br/>-
                        Le ramoneur dispose d&#x27;outils spécifiques et de techniques spécifiques (ramonage par le haut
                        ou
                        par
                        le
                        bas,
                        ramonage mécanique ou rotatif ...). Et vous ?
                    </p>
                    <p>
                        Pour votre sécurité et votre tranquillité, prévoyez au moins un ramonage par an par un
                        professionnel
                        expert.<br/>Même
                        si la période de chauffe est courte...
                    </p>
                </article>
                <article>
                    <h2 class="title">Quel est le prix d&#x27;un ramonage de cheminée ?</h2>
                    <p>
                        Le prix d&#x27;un ramonage dépendant du ramoneur et de votre installation. Comptez entre 40 et
                        80€
                        .<br/>Le
                        prix
                        est le même pour un poêle à bois, un cheminée fermée, une cheminée à foyer ouvert, un poêle
                        granulés...<br/>Le
                        débistrage ou l&#x27;entretien d&#x27;un poêle à granulés sont eux plus onéreux, normal, ils
                        prennent
                        plus
                        de
                        temps.
                    </p>
                </article>
                <article>
                    <h2 class="title">Comment ca se passe et combien de temps cela dure ?</h2>
                    <p>
                        - Cherchez un ramoneur qui opère dans votre zone géographique. <br/>- Vérifiez ses compétences,
                        ses
                        tarifs,
                        ses
                        disponibilités sur la fiche de AlloRamonage.fr puis par téléphone. <br/>- Prenez RDV si l&#x27;affaire
                        vous
                        semble entendue. <br/>- Le professionnel se présentera le Jour J. L&#x27;opération de ramonage
                        par
                        le
                        professionnel dure environ 1h.<br/>- Il vous délivrera une facture à régler et un avis de
                        ramonage à
                        la
                        fin
                        de l&#x27;opération.
                    </p>
                </article>
                <article>
                    <h2 class="title">Comment savoir si le ramonage est bien fait ?</h2>
                    <p>
                        Il n&#x27;est pas évident de savoir si le ramonage est bien fait. Voici quelques éléments d&#x27;appréciation
                        qui
                        sont discutables :<br/>- Le ramoneur en charge du ramonage prend il le temps de regarder /
                        auditer l&#x27;installation
                        ?<br/>- Le ramoneur est il soigneux et respectueux des personnes, du poêle à bois (ou autre)
                        comme
                        du
                        lieu
                        ?<br/>- Le ramonage semble t&#x27;il énergétique (cela ne se juge pas en fonction de la quantité
                        de
                        suie
                        tombée
                        car si vos conduits sont &quot;propres&quot;, peu de suie en tombera.<br/>- Le ramoneur est-il
                        de
                        bon
                        conseil
                        ?<br/>- Le ramoneur vous remet-il bien un certificat de ramonage (avec responsabilité civile) ?
                    </p>
                </article>
            </div>
        </div>
    </section>

<?php /**
 * REDIRECTION VERS LES AUTRES SITE DE CANOP
 */ ?>
    <section class="redirection">
        <h2>Vous cherchez ...</h2>
        <div class="row">
            <a id="pab" href="https://www.poelesabois.com/annuaire-revendeurs-distributeurs.php" target="_blank" class="col-sm-6"
               style="background-image: url('assets/img/pab.jpg')">
                <div class="filtre">
                    <span>UN POELE ?</span>
                </div>
            </a>
            <a id="bdc" href="https://www.bois-de-chauffage.net/" target="_blank" class="col-sm-6"
               style="background-image: url('assets/img/bdc.jpg')">
                <div class="filtre">
                    <span>DU BOIS ?</span>
                </div>
            </a>
        </div>
    </section>

<?php

require("../elements/footer.php");