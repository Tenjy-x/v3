<?php
include('../inc/connexion.php');
include('../inc/function.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_emprunt'])) {
    $id_emprunt = intval($_POST['id_emprunt']);
    $result = retourner_objet($bdd, $id_emprunt);
    if ($result) {
        header('Location: fiche_membre.php?retour=success');
        exit;
    } else {
        echo "<div class='alert alert-danger'>Erreur lors du retour de l'objet.</div>";
    }
} else {
    echo "<div class='alert alert-warning'>Donnée manquante ou requête invalide.</div>";
}
?>
