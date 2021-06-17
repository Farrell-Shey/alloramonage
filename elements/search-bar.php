<?php
function getServices($conn)
{
    $stmt = $conn->prepare('SELECT * FROM service');
    $stmt->execute();
    return $stmt->fetchAll();
}

function getDepartementById ($depatement_id, $conn){
    $stmt = $conn->prepare('SELECT * FROM departement WHERE id = :depatement_id');
    $stmt->bindParam(':depatement_id', $depatement_id);
    $stmt->execute();
    return $stmt->fetch();
}

$services = getServices($conn);
/*
 * Gestion des pré-remplissages des champs
 * */
if (isset($_SESSION['match']['params']['departement'])){ // la requète ne renvoie pas d'erreur
    $result = getDepartementByNumero($_SESSION['match']['params']['departement'], $conn);
    $placehold['departement'] = $result['numero'].' - '.$result['name'];

    if (isset($_SESSION['match']['params']['service'])){
        $placehold['service'] = $_SESSION['match']['params']['service'];
    }
} elseif (isset($_SESSION['error']['search'])) {
    $placehold['departement'] = $_SESSION['error']['search']['departement'];
    $placehold['service'] = $_SESSION['error']['search']['service'];
    unset($_SESSION['error']);

}


?>

<form action="/search" method="get" class="search-bar">
    <div class="form-floating">
        <input type="text" class="form-control" id="departement" name="departement" placeholder="*******" required="" <?= isset($placehold['departement']) ? ' value="'.$placehold['departement'].'"' : null ?>>
        <label for="departement">Département, Code postal</label>
    </div>
    <div class="form-floating">
        <select class="form-select" id="service" name="service">
            <option selected disabled hidden>selectionner un service</option>
            <?php foreach ($services as $service): ?>

                <option value="<?= $service['slug'] ?>"<?= (isset($placehold['service']) && $placehold['service'] === $service['slug']) ? ' selected' : null ?>><?= ucfirst($service['name']) ?></option>

            <?php endforeach; ?>
        </select>
        <label for="service">Service recherché</label>
    </div>
    <button class="btn btn-primary" type="submit">RECHERCHER</button>
</form>