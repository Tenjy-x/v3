<?php
include('../inc/connexion.php');
include('../inc/function.php');
session_start();

$id_membre = $_SESSION['user']['id_membre'];
// $id_emprunt = $_SESSION['user']['id_emprunt'];
$membre = getMembre($bdd, $id_membre);
$objets = getObjetsParCategorie($bdd, $id_membre);
$liste = liste_emprunt($bdd, $id_membre);
$emprunt = retourner_objet($bdd, $id_emprunt);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Fiche membre</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <div class="card mb-4 shadow">
        <div class="card-body">
            <h3 class="card-title">Fiche du membre</h3>
            <p><strong>Nom :</strong> <?php echo ($membre['nom']); ?></p>
            <p><strong>Email :</strong> <?php echo ($membre['email']); ?></p>
            <p><strong>Ville :</strong> <?php echo ($membre['ville']); ?></p>
            <p><strong>Date de naissance :</strong> <?php echo ($membre['date_naissance']); ?></p>
            <img src="../assets/uploads/<?php echo ($membre['image_membre']); ?>" alt="Photo membre" style="max-width:120px;max-height:120px;" class="rounded-circle">
        </div>
    </div>
    <h4>Objets du membre par catégorie</h4>
    <?php foreach ($objets as $categorie => $liste) { ?>
        <div class="mb-4">
            <h5 class="text-primary">Catégorie : <?php echo ($categorie); ?></h5>
            <div class="row">
            <?php foreach ($liste as $objet) { ?>
                <div class="col-md-3 mb-3">
                    <div class="card h-100">
                        <?php if (!empty($objet['nom_image'])) { ?>
                            <img src="../assets/uploads/<?php echo ($objet['nom_image']); ?>" class="card-img-top" alt="Photo objet" style="object-fit:cover;max-height:120px;">
                        <?php } else { ?>
                            <img src="../assets/uploads/default.png" class="card-img-top" alt="Aucune image" style="object-fit:cover;max-height:120px;">
                        <?php } ?>
                        <div class="card-body">
                            <h6 class="card-title"><?php echo ($objet['nom_objet']); ?></h6>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    <?php } ?>
    <h4>Historique des emprunts</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Objet</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($liste as $emprunt) { ?>
            <tr>
                <td><?php echo ($emprunt['nom_objet']); ?></td>
                <td>
                    <?php if (!empty($emprunt['date_retour']) && strtotime($emprunt['date_retour']) >= strtotime(date('Y-m-d'))) { ?>
                        <form action="traitement_retour.php" method="post" style="display:inline;">
                            <input type="hidden" name="id_emprunt" value="<?php echo $emprunt['id_emprunt']; ?>">
                            <button type="submit" class="btn btn-warning btn-sm">Retourner</button>
                        </form>
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>
    </div>
</body>
</html>
