
<?php 
include('../function.php');
// include('test.php');
addAll();
if(isset($_SESSION['utilisateur']) && !empty($_SESSION['utilisateur'])){
if(isset($_GET['del'])){
    deleteCandPanier();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>gestion élection</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- dselecct links -->
    <link rel="stylesheet" href="https://unpkg.com/@jarstone/dselect/dist/css/dselect.css">
    <!-- Favicons -->
    <link href="../assets/img/favicon.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
  <!-- <link rel="stylesheet" href="">  -->
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-datatables@8.0.1/dist/style.min.css"> -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <link href="assets/vendor/aoss/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="form1.css">


   
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
        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                
                <span class="d-none d-lg-block text-center">Election présidentielle</span>
            </a>
        </div>


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

         

            <li class="nav-heading">Pages</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="formPresident.php">
                    <i class="bi bi-person"></i>
                    <span>Eléction présidentielle</span>
                </a>
            </li>
            <!-- End Profile Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="formNationnaux.php">
                    <i class="bi bi-question-circle"></i>
                    <span>députation Nationnale</span>
                </a>
            </li>
            <!-- End F.A.Q Page Nav -->

           



        </ul>

    </aside>
    <!-- End Sidebar-->

   
        <!-- End Page Title -->

<main id="main" class="main">
  
    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
              <section class="order " id="order">


<!-- <h3 class=" sub-heading "> Nous écrire</h3> -->
<!-- <h1 class="heading text-center"> Présidentielles</h1> -->

            <form action="test.php" enctype="multipart/form-data" method="post">
           
                <div class="bord">

                    <img src="../assets/img/drapeau-republique-democratique-du-congo_1401-92.jpg" alt="">

                </div>
                <div class="inputBox ">
                    <div class="input ">
                        <select name="candidat"   id="cmb" class="mb-2 fs-2"  aria-label="default select example" required>
                            <option value="" selected>Sélectionner le candidat</option>
                            <?php $presidents=getPresidents();
                            foreach($presidents as $pr): ?>
                            <option value="<?=$pr['numero']?>"><?=$pr['nom_cand'].' '.$pr['postnom_cand'].' '.$pr['prenom_cand']?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="input ">
                        <select name="bureau" id="cmb2" class="" aria-label="default select example" required>
                            <option value="" >Bureau de vote concerné</option>
                            <?php $presidents=getBureaux();
                            foreach($presidents as $pr): ?>
                            <option value="<?=$pr['bur']?>" <?php if(isset($_SESSION['bureau']) && strcmp( $_SESSION['bureau'],$pr['bureau'])===0){ echo "selected";}?>  ><?=$pr['bureau']?></option>
                            <?php endforeach ?>n>
                        </select>
                    </div>
                </div>
                <div class="inputBox ">
                    <div class="input ">
                        <span>nombre des voix</span>
                        <input type="number" placeholder="Nombre de voix obtenus ici " name="voix" required>
                    </div>

                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <button type="submit"  class="btnn">Ajouter</button>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="datatable table table-striped table-hover table-responsive fs-4">
                        <thead >
                            <tr class="table-header">
                                <th >candidat</th>
                                 <th>nombre_voix</th> 
                                 <th>bureau</th> 
                                 <th>action</th> 
                                <!-- <th>prenom</th>
                                <th>sexe</th>
                                <th>adresse</th>
                                <th>mail</th>  -->
                            </tr>
                            
                        </thead>
                        <tbody>
                        <?php 
                        
                        $resu=getresultPanier();
                     foreach($resu as $re):?>
                                <tr >
                                    <td class="ligne">  <?=$re['nom'].' '.$re['prenom']?></td>
                                    <td>  <?=$re['voix']?></td>
                                    <td>  <?=$re['bureau']?></td>
                                    <td><a href="formPresident.php?del=<?=$re['cand']?>" class="btn-outline-danger">supprimer</a></td>
                                </tr>
                                <?php endforeach;  ?>
                        </tbody>
                </table>
                    </div>
                </div>
                
               
            

            </form>
            
            <form action="" enctype="multipart/form-data" method="post">
            
                <div class="inputBox ">
                    <div class="input ">
                        <span>inserrer le fichier </span>
                        <input type="file" name="image" required>
                    </div>

                </div>
                <!-- <div class="input ">
                    <span>la desription de l'article</span>
                    <textarea name=" " placeholder="Entrez le petit resumé de votre article ici " id=" " cols="30 " rows="10 "></textarea>
                </div> -->
                <div class="d-flex justify-content-between align-items-center">
                    <button type="submit"  class="btnn">envoyer</button>
                </div>
            

            </form>

              </section>
            </div>
        </div>
    </section>

</main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>nomDuParti</span></strong>. Tous droits Reservés
        </div>
        <div class="credits">

            Designed by <a href="">Ruben Butu</a>
        </div>
    </footer>
    <!-- End Footer -->

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>




















    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <script src="https://unpkg.com/@jarstone/dselect/dist/js/dselect.js"></script>

    
    
    <script src="../js/Chart.min.js"></script>
    
    <script defer src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script defer src="script.js"></script>
    <script src="../assets/js/script.js"></script>


    <!-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@8.0.1/dist/umd/simple-datatables.min.js"></script> -->

    <!-- Vendor JS Files -->
    <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/chart.js/chart.umd.js"></script>
    <script src="../assets/vendor/echarts/echarts.min.js"></script>
    <script src="../assets/vendor/quill/quill.min.js"></script>
    <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>
    <script src="../assets/vendor/aos/aos.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>
    <script src="Chart.min.js"></script>
    <script>
        
    const config = {
    search: true, // Toggle search feature. Default: false
    creatable: false, // Creatable selection. Default: false
    clearable: false, // Clearable selection. Default: false
    maxHeight: '360px', // Max height for showing scrollbar. Default: 360px
    size: '', // Can be "sm" or "lg". Default ''
}
dselect(document.querySelector('#cmb'), config)
dselect(document.querySelector('#cmb2'), config)
    </script>
    <script>
        var ligne=document.querySelectorAll('.ligne');
        for(var a=0;a<ligne.length;a++){
            var actu=ligne[a];
            a.addEventListener('click',function(){
                alert('cliqué');
            })
        }
    </script>
<script>

    // dselect(document.querySelector('#dselect-example'))

// document.addEventListener('DOMContentLoaded', () => {

          /**
   * Animation on scroll function and init
   */
  function aos_init() {
    AOS.init({
      duration: 800,
      easing: 'slide',
      once: true,
      mirror: false
    });
  }
  window.addEventListener('load', () => {
    aos_init();
  });

  
const barCanvas = document.getElementById('barCanvas');


new Chart(barCanvas, {
    type: 'bar',
    data: {
        // Les lables peuvent etre les elements d'une colone d'une base de table
        labels:<?= json_encode($nom)?>,
        datasets: [{
            label: 'mon graph',
            borderColor: ['#36A2EB', '#36A211', '#36A200', '#36A2A1'],
            backgroundColor: ['crimson', 'lightgreen', 'lightblue', 'violet'],
            data: <?= json_encode($pourcent)?>,
            fill: false,
            tension: 0.1,
            // lesmouvement au survol
            hoverOffset: 4,
            borderWidth: 1
        }]
    },
    options: {
        elements: {
            point: {
                pointBorderColor: "#333"
            }
        },

        scales: {
            y: {
                tiks: {
                    color: "#333"
                },
                suggestedMin: 0,
                suggestedMax: 50
            },
            x: {
                ticks: {
                    color: "#333"
                }
            }
        }
    }
});
        
const lineCanvas = document.getElementById('lineCanvas');


new Chart(lineCanvas, {
    type: 'line',
    data: {
        // Les lables peuvent etre les elements d'une colone d'une base de table
        labels:<?= empty(($prov))? 0:json_encode($prov) ?>,
        datasets: [{
            label: 'mon graph',
            borderColor: ['#36A2EB', '#36A211', '#36A200', '#36A2A1'],
            backgroundColor: ['crimson', 'lightgreen', 'lightblue', 'violet'],
            data: <?= empty(($voix))? 0:json_encode($voix) ?>,
            fill: false,
            tension: 0.1,
            // lesmouvement au survol
            hoverOffset: 4,
            borderWidth: 1
        }]
    },
    options: {
        elements: {
            point: {
                pointBorderColor: "#333"
            }
        },

        scales: {
            y: {
                tiks: {
                    color: "#333"
                },
                suggestedMin: 0,
                suggestedMax: 50
            },
            x: {
                ticks: {
                    color: "#333"
                }
            }
        }
    }
});




       
// });
    </script>


</body>

</html>
<?php } 
else
header('Location:../form/login.php')
?>
