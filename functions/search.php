<?php
function getDepartement($departement, $conn)
{

    // si $departement contient des numbre, on par du principe que le numéro de département ou le code postal à été rentré
    $numbers = strpbrk($departement, '1324567890');

    // si il n'y a pas de nombre alors il a rentré le nom du département
    if ($numbers === false) {

        $stmt = $conn->prepare("SELECT * FROM departement WHERE departement.name LIKE CONCAT('%', :departement, '%')");
        $stmt->bindParam(':departement', $departement);
        $stmt->execute();
        return $stmt->fetch();

    } // Sinon on fait une recherche sur les numéro de département
    else {

        // on récupère les 2 premiers termes en partant du premier numéro énoncé
        $departement = substr($numbers, 0, 2);

        if ($departement === '97') {

            // cas spécial des départements d'outre-mer qui sont en 3 chiffres
            $departement = substr($numbers, 0, 3);

        } elseif ($departement === '2a' || $departement === '2b') {

            // cas spécial de la corse qui est divisé en 2 sous-départements
            $departement = '20';

        }

        // requête en bdd
        $stmt = $conn->prepare('SELECT * FROM departement WHERE departement.numero = :departement');
        $stmt->bindParam(':departement', $departement);
        $stmt->execute();
        return $stmt->fetch();

    }
}

function getServiceBySlug($service_slug, $conn)
{
    // requête en bdd
    $stmt = $conn->prepare('SELECT * FROM service WHERE slug = :service_slug');
    $stmt->bindParam(':service_slug', $service_slug);
    $stmt->execute();
    return $stmt->fetch();
}

/*
 * Récupération des données à traiter
 */
$data = $_GET;

/*
 * Vérifier que le département existe bien
 */
$departement = getDepartement($data['departement'], $conn);

// si le departement n'existe pas
if ($departement == false) {

    // renvoie de l'erreur
    $_SESSION['search']['departement'] = $data['departement'];
}

/*
 * Vérifier que le service existe bien
 */
if (isset($data['service'])) {
    $service = getServiceBySlug($data['service'], $conn);

    // si le service n'existe pas
    if ($service == false) {

        // renvoie de l'erreur
        $_SESSION['search']['service'] = $data['service'];
    }
}




// si il y a une erreur, on r'envoie
if ($_SESSION['search']) {
    header('location: ' . $_SESSION['REDIRECT_URI']);
}

// Sinon on effectue la requête
else {

    /*
     * Créer l'url pour l'annuaire
     * typage de l'url :
     * /annuaire/departement-[i:departement.numero]/[*:service.slug]
     */
    $location = 'annuaire/departement-' . $departement['numero'] . ((isset($service) && $service != false) ? '/' . $service['slug'] : null);
    header('location: ' . $location);
}