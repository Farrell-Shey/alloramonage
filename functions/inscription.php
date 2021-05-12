<?php

if (isset($_POST['inscription'])) {

    $email = $_POST['email_inscription'];
    $password = $_POST['mot_de_passe'];
    $societe = $_POST['nom_entreprise'];
    $siren = $_POST['siren'];
    $adresse = $_POST['adresse'];
    $code_postal = $_POST['code_postal'];
    $ville = $_POST['ville'];
    $telephone = $_POST['telephone'];
    $timestamp = date('Y-m-d H:i:s');

    $query = $conn->prepare('INSERT INTO `user` (`password`, `email`, `societe`, `siren`, `adresse`, `code_postal`, `ville`, `tel`, `created_at`, `updated_at`) VALUES (:password, :email, :societe, :siren, :adresse, :code_postal, :ville, :telephone, :created, :updated)');

    $query->execute([
        'password' => $password,
        'email' => $email,
        'societe' => $societe,
        'siren' => $siren,
        'adresse' => $adresse,
        'code_postal' => $code_postal,
        'ville' => $ville,
        'telephone' => $telephone,
        'created' => $timestamp,
        'updated' => $timestamp,
    ]);

} 
