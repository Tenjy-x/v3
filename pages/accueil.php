<?php
    $id_membre = $_SESSION['user']['id_membre'];
    $liste = liste_objets_et_emprunts($bdd, $id_membre);
    $categories = selectCategorie($bdd);
?>
<div class="container">
    <div class="row">
        <form action="traitement_upload.php" method = "post" enctype="multipart/form-data">
            <input type="hidden" name="id_membre" value="<?php echo $id_membre; ?>">
            <h2 class="text-center mt-5">Ajouter un objet</h2>
            <div class="mb-3">
                <label for="nom_objet" class="form-label">Nom de l'objet</label>
                <input type="text" class="form-control" id="nom_objet" name="nom_objet" required>
            </div>
            <div class="mb-3">
                <select name="categorie" id="">
                    <option value="">Sélectionner une catégorie</option>
                    <?php while ($categorie = mysqli_fetch_assoc($categories)) { ?>
                        <option value="<?php echo $categorie['id_categorie']; ?>">
                            <?php echo $categorie['nom_categorie']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <input type="file" name="photo" id="">
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
        <div class="text-end mt-3">
            <a href="fiche_membre.php?id=<?php echo $id_membre; ?>" class="btn btn-info">Voir la fiche membre</a>
        </div>
    </div>
    <div class="accueil-container">
        <h2>Voici la liste des objets</h2>
        <div class="row">
        <?php foreach ($liste as $objet) { ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <?php if (isset($objet['nom_image']) && $objet['nom_image'] != '') { ?>
                        <img src="../assets/uploads/<?php echo htmlspecialchars($objet['nom_image']); ?>" class="card-img-top" alt="Photo de l'objet" style="object-fit:cover;max-height:200px;">
                    <?php } else { ?>
                        <img src="../assets/uploads/default.png" class="card-img-top" alt="Aucune image" style="object-fit:cover;max-height:200px;">
                    <?php } ?>
                    <div class="card-body">
                        <h5 class="card-title"><a href="modal.php?page=fiche&num=<?php echo $objet['id_objet']?>"><?php echo ($objet['nom_objet']);?></a></h5>
                        <?php if ($objet['date_retour']) { ?>
                            <p class="card-text text-danger">Emprunté, retour le <?php echo $objet['date_retour']; ?></p>
                        <?php } else {?>
                            <form action="affiche_emprunt.php" method="post" class="d-flex align-items-center gap-2">
                                <input type="hidden" name="id_objet" value="<?php echo $objet['id_objet']; ?>">
                                <input type="hidden" name="id_membre" value="<?php echo $id_membre; ?>">
                                <input type="number" name="jours" min="1" max="30" placeholder="Jours" class="form-control form-control-sm" style="width:80px;" required>
                                <button type="submit" class="btn btn-success btn-sm">Emprunter</button>
                            </form>
                            <?php }?>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
</div>