
<?php
    function inscription($bdd, $nom, $date_naissance, $email, $ville, $mdp, $image_membre) {
        $sql = "INSERT INTO Exam_Membres (nom, date_naissance, email, ville, mdp, image_membre) VALUES ('%s','%s' , '%s', '%s', '%s', '%s')";
        $sql = sprintf($sql , $nom, $date_naissance, $email, $ville, $mdp, $image_membre);
        $result = mysqli_query($bdd, $sql);
        return $result;
    }
    
    function liste_objets_et_emprunts($bdd, $id_membre) {
    $sql = "SELECT o.nom_objet, o.id_objet, img.nom_image, e.date_retour
            FROM Exam_Objet o
            LEFT JOIN Exam_Image_Objet img ON o.id_objet = img.id_objet
            LEFT JOIN Exam_Emprunt e ON o.id_objet = e.id_objet
            WHERE o.id_membre = '$id_membre'";
    // echo $sql;
    $result = mysqli_query($bdd, $sql);
    $liste = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $liste[] = $row;
        }
        return $liste;
    }

    function selectCategorie($bdd) {
        $sql = "SELECT * FROM Exam_Categorie_Objet";
        $result = mysqli_query($bdd, $sql);
        return $result;
    }
    function insertPhoto($bdd, $id_membre, $photo) {
        $sql = "INSERT INTO Exam_Image_Objet(id_objet, nom_image) VALUES ('%s', '%s')";
        $sql = sprintf($sql, $id_membre, $photo);
        $result = mysqli_query($bdd, $sql);
        return $result;
    }

    function insertObjet($bdd, $id_membre, $nom_objet, $id_categorie) {
        $sql = "INSERT INTO Exam_Objet (id_membre, nom_objet, id_categorie) VALUES ('%s', '%s', '%s')";
        $sql = sprintf($sql, $id_membre, $nom_objet, $id_categorie);
        // echo $sql;
        $result = mysqli_query($bdd, $sql);
        return $result;
    }
    function fiche_objet($bdd, $id_objet){
        $sql = "SELECT * FROM Exam_Objet JOIN Exam_Image_Objet ON Exam_Image_Objet.id_objet = Exam_Objet.id_objet WHERE Exam_Objet.id_objet = '$id_objet'";
        //echo $sql;
        $result = mysqli_query($bdd, $sql);
        return $result;
    }

    function historique_emprunt($bdd, $id_objet){
        $sql = "SELECT m.nom AS emprunteur, e.date_emprunt, e.date_retour
                FROM Exam_Emprunt e
                JOIN Exam_Membres m ON m.id_membre = e.id_membre
                WHERE e.id_objet = '$id_objet' ORDER BY e.date_emprunt DESC";
        $result = mysqli_query($bdd, $sql);
        $historique = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $historique[] = $row;
        }
        return $historique;
    }
    function getMembre($bdd, $id_membre) {
        $sql = "SELECT * FROM Exam_Membres WHERE id_membre = '$id_membre'";
        $result = mysqli_query($bdd, $sql);
        return mysqli_fetch_assoc($result);
    }

function getObjetsParCategorie($bdd, $id_membre) {
    $sql = "SELECT o.nom_objet, o.id_objet, o.id_categorie, c.nom_categorie, img.nom_image
            FROM Exam_Objet o
            JOIN Exam_Categorie_Objet c ON o.id_categorie = c.id_categorie
            LEFT JOIN Exam_Image_Objet img ON o.id_objet = img.id_objet
            WHERE o.id_membre = '$id_membre' ORDER BY o.id_categorie";
    $res_objets = mysqli_query($bdd, $sql);
    $objets = [];
    while ($row = mysqli_fetch_assoc($res_objets)) {
        $objets[$row['nom_categorie']][] = $row;
    }
    return $objets;
}
?>
