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

// si une requête a abouti
if (isset($_SESSION['match']['params']['departement'])){ // la requète ne renvoie pas d'erreur
    $result = getDepartementByNumero($_SESSION['match']['params']['departement'], $conn);
    $placehold['departement'] = $result['numero'].' - '.$result['name'];

    if (isset($_SESSION['match']['params']['service'])){
        $placehold['service'] = $_SESSION['match']['params']['service'];
    }
}

// Si une requête n'a pas abouti
if (isset($_SESSION['search'])) {
    $placehold['departement'] = $_SESSION['search']['departement'];
    isset($_SESSION['search']['service']) ? $placehold['service'] = $_SESSION['search']['service'] : null;


}


?>

<form action="/search" method="get" class="search-bar">
    <div class="form-floating">
        <input type="text" class="form-control<?= isset($_SESSION['search']['departement']) ? ' is-invalid' : null ?>" id="departement" name="departement" placeholder="*******" required="" <?= isset($placehold['departement']) ? ' value="'.$placehold['departement'].'"' : null ?>>
        <label for="departement">Département, Code postal</label>
    </div>
    <div class="form-floating">
        <select class="form-select<?= isset($_SESSION['search']['service']) ? ' is-invalid' : null ?>" id="service" name="service">
            <option selected disabled hidden>selectionner un service</option>
            <?php foreach ($services as $service): ?>

                <option value="<?= $service['slug'] ?>"<?= (isset($placehold['service']) && $placehold['service'] === $service['slug']) ? ' selected' : null ?>><?= ucfirst($service['name']) ?></option>

            <?php endforeach; ?>
        </select>
        <label for="service">Service recherché</label>
    </div>
    <button class="btn btn-primary" type="submit">RECHERCHER</button>
</form>
<?php

// unset du gestionnaire d'erreur de la bar de recherche
unset($_SESSION['search']);
?>