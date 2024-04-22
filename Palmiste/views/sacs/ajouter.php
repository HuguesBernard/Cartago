<form class="m-5" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" class="form-control" id="nom" name="nom">

    </div>
    <div class="mb-3">
        <label for="prix" class="form-label">Prix</label>
        <input type="text" class="form-control" id="prix" name="prix">
    </div>
    <div class="mb-3">
        <label for="quantite" class="form-label">Quantite</label>
        <input type="number" class="form-control" id="quantite" name="quantite">
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control" id="image" name="image">
    </div>
    <div class="mb-3 form-floating">
        <label for="courte_description" class="form-label">Courte description </label>
        <textarea class="form-control" name="courte_description" style="height: 100px" placeholder="Entrer votre courte description ici"
                  id="courte_description"></textarea>

    </div>
    <div class="mb-3 form-floating">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" name="description" style="height: 100px"
                  placeholder="Entrer votre description ici"
                  id="description"></textarea>

    </div>
    <input class="btn btn-primary" type="submit" value="Ajouter" name="save">
</form>

