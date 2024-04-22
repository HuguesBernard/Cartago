<table class="table container">

    <a class="btn btn-primary" href="<?= URI . "sacs/ajouter"; ?>">Ajouter un nouveau sac</a> 
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
        ?>
        <tr>
            <th scope="row"><?= $cmpt++; ?></th>
            <td><img height="100px" width="100px" src="<?=
                (isset($sac->chemin_image)) ? URI . $sac->chemin_image
                    : URI . "assets/image.jpeg";

                ?>" alt="">

            </td>
            <td><?= $sac->nom; ?></td>
            <td><?= $sac->prix; ?></td>
            <td><?= $sac->quantite; ?></td>
            <td><?= $sac->courte_description; ?></td>
            <td class="row">
                <a class="btn btn-info col" href="#"><i class="bi bi-pencil-square"></i></a>


                <a class="btn btn-danger col" href=<?= URI . "sacs/supprimer/" . $sac->id_sac; ?>><i
                            class="bi bi-trash3"></i></a> 

            </td>
        </tr>
        <?php
    }

    ?>

    </tbody>
</table>
