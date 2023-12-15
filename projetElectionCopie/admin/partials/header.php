<?php 
include('../function.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>gestion élection</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/img/favicon.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/@jarstone/dselect/dist/css/dselect.css">

    <!-- Vendor CSS Files -->
  <!-- <link rel="stylesheet" href="">  -->
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-datatables@8.0.1/dist/style.min.css"> -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <!-- <link href="assets/vendor/aoss/aos.css" rel="stylesheet"> -->

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">
  

   
</head>
<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="../assets/img/eazy.PNG" alt="">
                <span class="d-none d-lg-block">KAPITA</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>
        <!-- End Logo -->



        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="users/<?= $_SESSION['image']?>" alt="Profile" class="rounded-circle">
                        <?php $user=utilisateur();
                        foreach($user as $us){
                            $name=$us['nom_user'];
                            $postnom=$us['prenom'];
                        }
                        ?>

                        <span class="d-none d-md-block dropdown-toggle ps-2"><?= $name."  ".$postnom ?></span>
                    </a>
                    <!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6><?= $name."  ".$postnom ?></h6>
                            <span>Administrateur</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <!-- <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-person"></i>
                                <span>Mon Profile</span>
                            </a>
                        </li> -->
                        <li>
                            <hr class="dropdown-divider">
                        </li>





                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="../form/login.php">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Me déconnecter</span>
                            </a>
                        </li>

                    </ul>
                    <!-- End Profile Dropdown Items -->
                </li>
                <!-- End Profile Nav -->

            </ul>
        </nav>
        <!-- End Icons Navigation -->

    </header>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="index.php">
                    <i class="bi bi-grid"></i>
                    <span>Tableau de Bord</span>
                </a>
            </li>
            <!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Résultats</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="presidentiel.php">
                            <i class="bi bi-circle"></i><span>élection présidentielle</span>
                        </a>
                    </li>
                    <li>
                        <a href="nationnal.php">
                            <i class="bi bi-circle"></i><span>Députaion nationnale</span>
                        </a>
                    </li>

                </ul>
            </li>
            <!-- End Components Nav -->


       
            <!-- End Icons Nav -->

            <li class="nav-heading">Pages</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="candidat.php">
                    <i class="bi bi-person"></i>
                    <span>Candidat</span>
                </a>
            </li>
            <!-- End Profile Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="circonscription">
                    <i class="bi bi-question-circle"></i>
                    <span>Circonscription</span>
                </a>
            </li>
            <!-- End F.A.Q Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="centre.php">
                    <i class="bi bi-envelope"></i>
                    <span>Centre</span>
                </a>
            </li>
            <!-- End Contact Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="bureau.php">
                    <i class="bi bi-card-list"></i>
                    <span>Bureau</span>
                </a>
            </li>
            <!-- End Register Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="temoin.php">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span>Témoin</span>
                </a>
            </li>
            <!-- End Login Page Nav -->



        </ul>

    </aside>
    <!-- End Sidebar-->

   
        <!-- End Page Title -->
