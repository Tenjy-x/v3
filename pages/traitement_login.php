<?php
    include('../inc/connexion.php');
    include('../inc/function.php');
    session_start();
    ini_set('display_errors', 1);
    $email = $_POST['email'] ;
    $password = $_POST['password'];
    $sql = "SELECT * FROM Exam_Membres WHERE email = '$email' AND mdp = '$password'";
    $verify = mysqli_query($bdd, $sql);
    $data = mysqli_fetch_assoc($verify);
    if($data == null) {
        header('Location: modal.php?page=login&error=1');
    }else {
        header('Location: modal.php?page=accueil');
        $_SESSION['user'] = $data;
    }
?>