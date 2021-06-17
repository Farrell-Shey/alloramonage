<?php
function getDepartement($departement, $conn)
{


    $numbers = strpbrk($departement, '1324567890');

    if ($numbers === false) {

        $stmt = $conn->prepare("SELECT * FROM departement WHERE departement.name LIKE CONCAT('%', :departement, '%')");
        $stmt->bindParam(':departement', $departement);
        $stmt->execute();
        return $stmt->fetch();

    } else {
        /* ça marche po, à modif */
        if (strpos( $departement , '97') == true) {        // si on est sur les départements d'outre-mer -- à savoir que sur un passage php 8.0 str_contains est plus adapté
            $departement = substr($numbers, 0, 3);
            echo 'test';
        } else {                                                    // si on est sur les départements métropolitain
            $departement = substr($numbers, 0, 2);
            echo 'test2';
        }
        $stmt = $conn->prepare('SELECT * FROM departement WHERE departement.numero = :departement');
        $stmt->bindParam(':departement', $departement);
        $stmt->execute();
        return $stmt->fetch();

    }
}

function getServiceBySlug($service_slug, $conn)
{
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
if ($departement == false) {
    // renvoie de l'erreur
    $_SESSION['error']['search']['departement'] = $data['departement'];
    $_SESSION['error']['search']['service'] = $data['service'];
    header('location: '. $_SESSION['REDIRECT_URI']);
} else {

    /*
     * Vérifier que le service existe bien
     */
    if (isset($data['service'])) {
        $service = getServiceBySlug($data['service'], $conn);
    }


    /*
     * Créer l'url pour l'annuaire
     * typage de l'url :
     * /annuaire/departement-[i:departement.numero]/[*:service.slug]
     */
    $location = 'annuaire/departement-' . $departement['numero'] . ((isset($service) && $service != false) ? '/' . $service['slug'] : null);


    header('location: ' . $location);
}