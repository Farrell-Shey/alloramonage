<?php

require ("../elements/header_administration.php");
require ('../functions/administration/admin.php');

$tables = getTables();

?>

<label for="table-select">Quelle table voulez-vous modifier ?</label>

<select name="table" id="table-select">
    <option selected disabled hidden>Sélectionner une table</option>
    <?php foreach ($tables as $table) : ?>
        <option value="<?= $table[0] ?>"><?= $table[0] ?></option>
    <?php endforeach; ?>
</select>

<div id="empty-select"></div>

<script src='/assets/js/app.js'></script>