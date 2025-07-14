<?php

    $id_membre = $_SESSION['user']['id_membre'];
    $id_objet = $_POST['id_objet'] ;
    $number_days = $_POST['jours'];
    $emprunt = emprunter($bdd, $id_objet, $id_membre, $number_days);
?>