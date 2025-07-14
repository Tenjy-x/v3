<?php
    include('../inc/connexion.php');
    include('../inc/function.php');
    session_start();
    $uploadDir = __DIR__ . '/../assets/uploads/';
    $maxSize = 100 * 1024 *1024 ;
    $allowedMimeTypes = ['image/jpeg' , 'image/png' , 'image/webp'];

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['photo'])) {
        $photo = $_FILES['photo'];
        $nom_objet = isset($_POST['nom_objet']) ? $_POST['nom_objet'] : '';
        $categorie = isset($_POST['categorie']) ? $_POST['categorie'] : '';
        $id_membre = isset($_POST['id_membre']) ? $_POST['id_membre'] : (isset($_SESSION['user']['id_membre']) ? $_SESSION['user']['id_membre'] : null);

        if($photo['error'] !== UPLOAD_ERR_OK) {
            die('Erreur sur importation'.$photo['error']);
        }
        if($photo['size'] > $maxSize) {
            die('fichier est trop volumineux.');
        }
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $photo['tmp_name']);
        finfo_close($finfo);
        if (!in_array($mime, $allowedMimeTypes)) {
            die('Type de fichier non autorisé : ' . $mime);
        }
        $originalName = pathinfo($photo['name'], PATHINFO_FILENAME);
        $extension = pathinfo($photo['name'], PATHINFO_EXTENSION);
        $newName = $originalName . '_' . uniqid() . '.' . $extension;
        if (move_uploaded_file($photo['tmp_name'], $uploadDir . $newName)) {
            echo "Fichier uploadé avec succès : ";
            $insertObjet = insertObjet($bdd, $id_membre, $nom_objet, $categorie, $newName);
        } else {
            echo "Échec du déplacement du fichier.";
        }
    } else {
        echo "Aucun fichier reçu.";
    }

?>