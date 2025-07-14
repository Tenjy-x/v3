<?php
$id_objet = $_GET['num'] ;
$fiche = fiche_objet($bdd, $id_objet);
$objet = mysqli_fetch_assoc($fiche);
$historique = historique_emprunt($bdd, $id_objet);
?>
<div class="container mt-5">
  <div class="row">
    <div class="col-md-5">
      <div class="card shadow">
        <img src="../assets/uploads/<?php echo htmlspecialchars($objet['nom_image']); ?>" class="card-img-top" alt="Photo de l'objet" style="object-fit:cover;max-height:300px;">
        <div class="card-body">
          <h4 class="card-title"><?php echo htmlspecialchars($objet['nom_objet']); ?></h4>
          <p class="card-text">Catégorie : <?php echo htmlspecialchars($objet['id_categorie']); ?></p>
        </div>
      </div>
    </div>
    <div class="col-md-7">
      <h5>Historique des emprunts</h5>
      <table class="table table-striped table-bordered">
        <thead class="table-dark">
          <tr>
            <th>Emprunteur</th>
            <th>Date d'emprunt</th>
            <th>Date de retour</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($historique as $emprunt) { ?>
            <tr>
              <td><?php echo htmlspecialchars($emprunt['emprunteur']); ?></td>
              <td><?php echo htmlspecialchars($emprunt['date_emprunt']); ?></td>
              <td><?php echo htmlspecialchars($emprunt['date_retour']); ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>