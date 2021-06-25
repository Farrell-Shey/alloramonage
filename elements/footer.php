<?php

function getDepartements($conn)
{
    $stmt = $conn->prepare('SELECT * FROM departement');
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// liste des marques partenaires affichées sur le bandeau du footer
$partenaires =
    [
        'MorettiDesign' => 'morettidesign',
        'Turbo Fonte' => 'turbo-fonte',
        'Termatech' => 'termatech',
        'Spartherm' => 'spartherm',
        'Poujoulat' => 'poujoulat',
        'Charnwood' => 'charnwood',
        'Skantherm' => 'skantherm',
        'Manincor' => 'de-manincor',
        'Interstoves' => 'interstoves',
    ];

$departements = getDepartements($conn);

?>
</main>

<footer>
    <?php /****************************************
     * BLOC PARTENAIRE
     ***********************************************/ ?>
    <div class="bloc_partenaire">
        <span>Avec le<br>soutien de :</span>
        <div class="partenaires">

            <?php foreach ($partenaires as $marque => $partenaire) : ?>

                <div class="partenaire" id="<?= $partenaire ?>">
                    <a href="https://www.poeles.net/poele-a-bois/choisir/fabricants/<?= $partenaire ?>.php" target="_blank">
                        <img title="<?= $marque ?>" alt="<?= $marque ?>"
                             src="/assets/img/logo/<?= $partenaire ?>.jpg">
                    </a>
                </div>

            <?php endforeach; ?>

        </div>
    </div>

    <div class="bloc_redirect">
        <p>
            Le <span class="text-primary">ramonage des cheminées</span> et des poeles est une question de sécurité et de
            performance de l’installation avant d'être une obligation légale.<br>Avec Allo Ramonage .fr, trouvez un
            ramoneur professionnel près de chez vous et comparez les services gratuitement.
        </p>
        <form action="/search" method="get">
            <div class="form-floating">
                <select class="form-select" id="departement" name="departement">
                    <?php foreach ($departements as $departement): ?>

                        <option value="<?= $departement['numero'] ?>"><?= $departement['numero'] . ' - ' . $departement['name'] ?></option>

                    <?php endforeach; ?>
                </select>
                <label for="departement">Choix du département</label>
            </div>
            <button class="btn btn-primary" type="submit">
                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M8.35576 16.5847C3.741 16.5847 0 12.8721 0 8.29236C0 3.71261 3.741 0 8.35576 0C12.9705 0 16.7115 3.71261 16.7115 8.29236C16.7115 10.2086 16.0566 11.9731 14.9567 13.3772L20.5836 18.9614L19.1065 20.4273L13.4796 14.8431C12.0647 15.9347 10.2867 16.5847 8.35576 16.5847ZM14.6224 8.29246C14.6224 11.7273 11.8167 14.5117 8.35562 14.5117C4.89456 14.5117 2.08881 11.7273 2.08881 8.29246C2.08881 4.85765 4.89456 2.07319 8.35562 2.07319C11.8167 2.07319 14.6224 4.85765 14.6224 8.29246Z"
                          fill="white"/>
                </svg>
            </button>
        </form>
    </div>
    <div class="mention">
        <div class="container">
            <span>© Tous droits réservés 2005/2021 Can'OP</span>
            <div>
                <a class="lien" href="/ref.php">Liens </a> -
                <a class="lien" href="/contact.php">Contact </a> -
                <a class="lien" href="/conditions.php"> Conditions</a> -
                <a class="lien" href="/societe.php">Société</a> -
                <a class="lien" href="annuaire_ramoneur-listing.php">Annuaire</a> -
                <a class="lien" href="/Faq.php">FAQ </a>
            </div>
        </div>
    </div>
</footer>
<script src="assets/js/manifest.js"></script>
<script src="assets/js/vendor.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>