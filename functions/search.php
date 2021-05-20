<?php

$data = $_GET;

var_dump($data);




function getDepartement($departement, $conn)
{


    $numbers = strpbrk($departement, '1324567890');

    if ($numbers === false ) {

        $stmt = $conn->prepare('SELECT * FROM departement WHERE departement.name LIKE %:departement%');
        $stmt->bindParam(':departement', $departement);
        $stmt->execute();
        return $stmt->fetch();

    } else {

        $stmt = $conn->prepare('SELECT * FROM departement WHERE departement.numero = :departement');
        $stmt->bindParam(':departement', substr($numbers, 0, 2));
        $stmt->execute();
        return $stmt->fetch();

    }
}

function getService($id)
{
    $stmt = $conn->prepare('SELECT * FROM service WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch();
}

$departement = getDepartement($data['departement']);
$service = getService($data['service']);
$location = '';

if ($departement != false) {
    $location .= 'departement-'.$departement['numero'];
}
if ($departement != false && $service != false) {
    $location .= '/';
}
if ($service != false) {
    $location .= $service['name'];
}

var_dump($location);
die();

header( 'location : /' . $location);