<?php
  include('../inc/connexion.php');
  include('../inc/function.php');
  session_start();
  ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

<body style="background: linear-gradient(120deg, #f8fafc 0%, #e0e7ef 100%); min-height: 100vh;">
<script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <div class="container py-5">
      <nav class="navbar navbar-expand-lg navbar-light bg-white shadow rounded mb-4">
        <div class="container-fluid">
          <a class="navbar-brand fs-2 fw-bold text-primary" href="#">TENJYXHARENA</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active fw-semibold" aria-current="page" href="modal.php?page=accueil">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fw-semibold" href="modal.php?page=details">Details</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <?php 
        $page = $_GET['page'];
        include($page.".php");      
      ?>
    </div>
</body>
</html>