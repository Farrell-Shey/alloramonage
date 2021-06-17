<?php

function getCertif($certif)
{
    return ($certif === true) ?
        '<div class="certif">
            <svg width="86" height="85" viewBox="0 0 86 85" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="4.5" y="4.5" width="77" height="76" rx="38" stroke="#CA476C" stroke-width="9"/>
                <rect x="13" y="13" width="60" height="59" rx="29.5" fill="#CA476C"/>
                <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M27 30.1999C27 28.4326 28.4326 27 30.1999 27H55.7988C57.5659 27 58.9985 28.4325 58.9986 30.1997L59 38.7353L57.2923 37.4523C55.6879 36.2469 53.695 35.533 51.5323 35.533C46.2306 35.533 41.9327 39.8308 41.9327 45.1325C41.9327 47.2953 42.6466 49.2882 43.8521 50.8926L44.0659 51.1773V58.9986H30.1999C28.4326 58.9986 27 57.566 27 55.7988V30.1999ZM44.0659 37.6662H33.3997V35.533H44.0659V37.6662ZM33.3997 44.0659H39.7994V41.9327H33.3997V44.0659Z"
                      fill="white"/>
                <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M51.5323 37.6662C47.4087 37.6662 44.0659 41.009 44.0659 45.1325C44.0659 47.1669 44.8796 49.0113 46.1992 50.3579V57.932C46.1992 58.336 46.4274 58.7053 46.7888 58.886C47.1501 59.0667 47.5826 59.0277 47.9058 58.7853L51.5323 56.0654L55.1588 58.7853C55.482 59.0277 55.9144 59.0667 56.2758 58.886C56.6371 58.7053 56.8654 58.336 56.8654 57.932V50.3579C58.185 49.0113 58.9986 47.1669 58.9986 45.1325C58.9986 41.009 55.6558 37.6662 51.5323 37.6662ZM48.3324 55.7988V51.8804C49.3022 52.3411 50.3871 52.5989 51.5323 52.5989C52.6774 52.5989 53.7623 52.3411 54.7321 51.8804V55.7988L52.1722 53.8788C51.793 53.5944 51.2715 53.5944 50.8923 53.8788L48.3324 55.7988Z"
                      fill="white"/>
            </svg>
            <span>certificat délivré</span>
        </div>'
        :
        null;
}

function getCostic($costic)
{
    return ($costic === true) ?
        '<img class="costic" src="*" alt="">'
        :
        null;
}

function getServiceBySlug($service_slug, $conn)
{
    $stmt = $conn->prepare('SELECT * FROM service WHERE slug = :service_slug');
    $stmt->bindParam(':service_slug', $service_slug);
    $stmt->execute();
    return $stmt->fetch();
}

function getDepartementByNumero($depatement_numero, $conn)
{
    $stmt = $conn->prepare('SELECT * FROM departement WHERE numero = :depatement_numero');
    $stmt->bindParam(':depatement_numero', $depatement_numero);
    $stmt->execute();
    return $stmt->fetch();
}

function getRamoneurs($departement, $conn, $service = null)
{
    $request = 'SELECT user.* FROM user INNER JOIN chalandise ON user.id = chalandise.user_id INNER JOIN departement ON chalandise.departement_id = departement.id ' .
        ($service !== null ? 'INNER JOIN prestation ON user.id = prestation.user_id INNER JOIN service ON prestation.service_id = service.id ' : null) .
        'WHERE departement.id = :departement_id ' .
        ($service !== null ? 'AND service.id = :service_id ' : null) .
        'ORDER BY chalandise.priorite DESC';

    $stmt = $conn->prepare($request);
    if (isset($departement)) {
        $stmt->bindParam(':departement_id', $departement);
    }
    if ($service !== null) {
        $stmt->bindParam(':service_id', $service);
    }
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getUserPrestations($user_id, $conn)
{
    $stmt = $conn->prepare('SELECT * FROM prestation INNER JOIN service ON prestation.service_id = service.id WHERE user_id = :user_id');
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// récupération des info en bdd consernant le service recherché
if (isset($_SESSION['match']['params']['service'])) {
    $service_recherche = getServiceBySlug($_SESSION['match']['params']['service'], $conn);
}

// récupération en bdd des infos concernant le département visée par la recherche
if (isset($_SESSION['match']['params']['departement'])) {
    $departement = getDepartementByNumero($_SESSION['match']['params']['departement'], $conn);

    // metatilte et metadescription lors d'une recherche
    $metatitle = 'Tous les Ramoneurs pour ' . $departement['name'] . (isset($service_recherche['name']) ? ' - ' . $service_recherche['name'] : null);
    $metadesc = 'Tous les Ramoneurs pour ' . $departement['name'] . (isset($service_recherche['name']) ? ' - ' . $service_recherche['name'] : null);

    /*
     * On va chercher tout les ramoneurs qui correspond à la recherche en question en passant les paramêtres de recherche contenu dans $param['url']
     */

    $ramoneurs = getRamoneurs($departement['id'], $conn, isset($service_recherche) ? $service_recherche['id'] : null);
} else { // paramêtre par défault de la page de recherche ( pas de recherche en cours )
    $metatitle = "Recherchez les Ramoneurs proche de chez vous | AlloRamonage";
}


/*
 * table User
 * $ramoneurs =
 *    [
 *        1 =>
 *            [
 *                'id' => '',                         - CLE PRIMAIRE -
 *                'password' => '',
 *                'societe' => '',
 *                'thumbnail' => '',
 *                'contact' => '',
 *                'siren' => '',
 *                'adresse' => '',
 *                'code_postal' => '',
 *                'ville' => '',
 *                'desc' => '',
 *                'certif' => bool true / false,
 *                'costic' => bool true / false,
 *                'pays' => 'france',
 *                'tel' => '06________',
 *                'email' => '_____@____.___',          - CLE UNIQUE -
 *                'site_web' => '_____.___',
 *                'statut' => '',                       EN ATTENTE / VALIDER / REFUSER
 *                'commentaire_admin' => '',            COMMENTAIRE INTERNE ADMIN
 *                'created_at' => '',
 *                'updated_at' => '',
 *            ],
 *        ...
 *    ];
 */
?>


<?php require("../elements/header.php"); ?>

    <section class="search-annuaire">
        <h1>L’annuaire des ramoneurs <?= isset($departement) ? 'pour ' . $departement['name'] : 'de vos régions' ?></h1>
        <?php require("../elements/search-bar.php"); ?>
    </section>

    <section class="result">


        <?php
        /*
         * Pour chaque ramoneur on fait un affichage de carte
         */
        if (isset($ramoneurs) && $ramoneurs != null) :
            foreach ($ramoneurs as $ramoneur) : ?>

                <section class="card-result card">


                    <h2 class="name"><?= $ramoneur['societe'] ?></h2>
                    <p class="adresse"><?= $ramoneur['adresse'] . ' ' . $ramoneur['code_postal'] . ' ' . $ramoneur['ville'] ?></p>
                    <p class="desc"><?= $ramoneur['description'] ?></p>
                    <div class="thumbnail">
                        <?php if (isset($ramoneur['thumbnail']) && $ramoneur['thumbnail'] !== '') : ?>
                            <img src="assets/<?= $ramoneur['thumbnail'] ?>"
                                 alt="<?= $ramoneur['societe'] ?>">
                        <?php else : ?>
                            <img src="/assets/img/default_img.svg" alt="y'a pas d'image" style="margin: auto">
                        <?php endif; ?>
                    </div>

                    <?= getCertif($ramoneur['certif']) ?>
                    <?= getCostic($ramoneur['costic']) ?>

                    <div class="services">
                        <span>Services :</span>

                        <div class="prestations">

                            <?php $prestations = getUserPrestations($ramoneur['id'], $conn); ?>
                            <?php foreach ($prestations as $prestation) : ?>

                                <span class="prestation<?= (isset($service_recherche) && $prestation['id'] == $service_recherche['id']) ? ' recherche' : null ?>">
                                <?= $prestation['name'] . ' : ' . $prestation['price'] . ' €' ?>
                            </span>

                            <?php endforeach; ?>

                        </div>

                    </div>

                    <div class="lien">
                        <?php if (isset($ramoneur['site_web']) && $ramoneur['site_web'] != '') : ?>
                            <a class="site_web btn btn-outline-primary" href="<?= $ramoneur['site_web'] ?>">
                                site internet
                            </a>
                        <?php endif; ?>

                        <a class="email btn btn-outline-primary" href="<?= $ramoneur['email'] ?>">
                            E-Mail
                        </a>

                        <?php if (isset($ramoneur['tel']) && $ramoneur['tel'] != '') : ?>
                            <a class="tel btn btn-outline-primary" href="tel:<?= $ramoneur['tel'] ?>">
                                tel : <?= $ramoneur['tel'] ?>
                            </a>
                        <?php endif; ?>
                    </div>

                </section>

            <?php endforeach;
        /*
         * Message affiché si il n'y a pas de ramoneur pour la région séléctionnée
         * */
        elseif (isset($departement)): ?>
            <div class="no-result">
                <div class="text"><?= ucfirst($departement['name']) ?> n'a pas encore de Ramoneur
                    enregistré <?= isset($_SESSION['match']['param']['service']) ? 'pour la réalisation de ' . $_SESSION['match']['param']['service'] : null ?></div>
                <a class="btn btn-outline-primary btn-lg"
                   onclick="document.getElementById('registration').classList.toggle('d-none');">
                    Professionel dans ce département ?
                </a>
            </div>

        <?php endif; ?>

    </section>

<?php require("../elements/footer.php");
