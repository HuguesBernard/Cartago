<h1 class="text-center">Gestion Panier</h1>
<table class="table container">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Image</th>
        <th scope="col">Nom</th>
        <th scope="col">Prix</th>
        <th scope="col">Quantite</th>
        <th scope="col">Courte description</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $cmpt = 1;
    foreach ($sacs as $sac) { 
        // sac => [$quantite, $sac]
        $quantite = $sac[0];
        $sac = $sac[1];
        ?>
        <form action="<?= URI . "paniers/modifier/" . $sac->id_sac; ?>" method="post"> 
            <tr>
                <th scope="row"><?= $cmpt++; ?></th>
                <td><img height="100px" width="100px" src="<?=
                    (isset($sac->chemin_image)) ? URI . $sac->chemin_image
                        : URI . "assets/image.jpeg";

                    ?>" alt="">

                </td>
                <td><?= $sac->nom; ?></td>
                <td><?= $sac->prix; ?></td>
                <td><input name="quantite" type="number" min="0" max="<?= $sac->quantite; ?>" 
                           value="<?= $quantite; ?>">
                </td>
                <td><?= $sac->courte_description; ?></td>
                <td class="row">
                    <button type="submit" name="modifier" class="btn btn-info col"><i
                                class="bi bi-pencil-square"></i></button>


                    <a class="btn btn-danger col" href=<?= URI . "paniers/supprimer/" . $sac->id_sac; ?>><i
                                class="bi bi-trash3"></i></a>

                </td>
            </tr>
        </form>
        <?php
    }

    ?>

    </tbody>
</table>
