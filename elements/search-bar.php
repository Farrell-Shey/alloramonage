<form action="search" method="get" class="search-bar">
    <div class="form-floating">
        <input type="text" class="form-control" id="departement" name="departement" placeholder="*******" required="">
        <label for="departement">Départment</label>
    </div>
    <div class="form-floating">
        <select class="form-select" id="service" name="service">
            <option selected disabled hidden>selectionner un service</option>
            <option value="test">test</option>
            <?php foreach ($services as $service): ?>

                <option value="<?= $service['id'] ?>"><?= $service['name'] ?></option>

            <?php endforeach; ?>
        </select>
        <label for="service">Service recherché</label>
    </div>
    <button class="btn btn-primary" type="submit">RECHERCHER</button>
</form>