<?php



//$services = getServices();

require ("../elements/header.php");

?>

<section class="home-jumbotron">
    <h1 class="title_h1">Trouvez un ramoneur<br>près de chez vous & comparez</h1>
    <form>
        <div class="form-floating">
            <input type="text" class="form-control" id="departement" name="departement" placeholder="*******" required="">
            <label for="departement">Ville, Départment</label>
        </div>
        <div class="form-floating">
            <select class="form-select" id="service">
                <option selected disabled hidden>selectionner un service</option>
                <?php foreach ($services as $service): ?>

                <option value="<?= $service['id'] ?>"><?= $service['name'] ?></option>

                <?php endforeach; ?>
            </select>
            <label for="service">Service recherché</label>
        </div>
        <button class="btn btn-outline-primary" type="submit">RECHERCHER</button>
    </form>
</section>
<section class="container">
    <h2 class="title_h2">Pourquoi faire appel à un ramoneur ?</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam asperiores consectetur deserunt, enim esse eveniet expedita, explicabo hic laboriosam laudantium minus modi possimus provident ratione reprehenderit similique veniam voluptatibus. Accusamus commodi consectetur dolore expedita hic ipsam numquam ratione recusandae rem repellendus. At distinctio maiores quae quos. Beatae harum nobis ratione.</p>
<a class="btn btn-outline-primary btn-lg">Lire la suite ></a>
</section>
<section class="redirection">
    <h2>Vous cherchez ...</h2>
    <div class="row">
        <a href="poeles.net" class="col-sm-6">
            <span class="poele-net">UN POELE ?</span>
        </a>
        <a href="poeles.net" class="col-sm-6">
            <span class="bois-de-chauffage">DU BOIS ?</span>
        </a>
    </div>
</section>

<?php

require ("../elements/footer.php");