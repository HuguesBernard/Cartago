<div class="container">
    <h1 class="text-center">Sacs populaires</h1> 
    <div class="row row-cols-1 row-cols-md-3 g-4 py-5">
        <?php
        foreach ($sacs as $sac) { 
            ?>
            <div class="col">
                <div class="card">
                    <img height="400px" width="200px" src="<?=
                    (isset($sac->chemin_image)) ? URI . $sac->chemin_image
                        : URI . "assets/image.jpeg";

                    ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $sac->nom; ?> </h5> 
                        <p class="card-text"><?= $sac->courte_description; ?></p> 
                    </div>
                    <div class="d-flex justify-content-aroud mb-5">
                        <h3> <?= $sac->prix; ?>$</h3> 
                    </div>
                    <a class="btn btn-primary" href="<?= URI . "paniers/ajouter/" . $sac->id_sac ?>">Ajouter au
                        panier</a> 
                </div>

            </div>

            <?php
        }

        ?>


    </div>

</div>
