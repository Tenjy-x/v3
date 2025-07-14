<?php
    ini_set('display_errors', 1);
    // if($bdd = mysqli_connect('localhost' , 'ETU003920' , 'RFLeYjXJ' , 'db_s2_ETU003920')){
    // }
    // else{
    //     echo 'Erreur';
    // }
    if($bdd = mysqli_connect('localhost' , 'root' , '' , 'Exam_final')){
    }
    else{
        echo 'Erreur';
    }
?>