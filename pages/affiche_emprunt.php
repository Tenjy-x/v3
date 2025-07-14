<?php
    include('../inc/connexion.php');
    include('../inc/function.php');
    $id_membre = $_SESSION['user']['id_membre'];
    $id_objet = $_POST['id_objet'] ;
    $number_days = $_POST['jours'];
    
?>