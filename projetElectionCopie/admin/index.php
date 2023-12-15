
<?php include('partials/header.php');
if(isset($_SESSION['utilisateur']) && !empty($_SESSION['utilisateur'])){
    ?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tableau de Bord</h1>
        <nav class="d-flex justify-content-between">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Tableau de Bord</li>

            </ol>
            <div>
            <!-- <div class="btn btn-outline-primary mt-0 text-light"><a href="addCand.php">ajouter candidat</a></div> -->

            </div>
        </nav>
        <hr>
    </div>
    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
            <table class="table table-responsive  table-hover datatable" id="example" style="width: 100%;" >
                <thead class="table-dark">
                    <tr>
                        <td class="text-center ">numero</td>
                        <td class="text-center ">candidat</td>
                        <td class="text-center ">Nbre Voix</td>
                        <td class="text-center ">bureau</td>
                        <td class="text-center ">centre</td>
                        <td class="text-center ">circonscription</td>
                        <td class="text-center ">province</td>
                        <td class="text-center  ">fichier</td>


                    </tr>
                </thead>
                <tbody>
                    <?php 
                    // include('function.php');
            
                        $a=getresult();
                        foreach($a as $r):
                        ?>      
                        <tr>
                            <td><?= $r['numero']?></td>
                            <td><?= $r['nom']?></td>
                            <td><?= $r['voix']?></td>
                            <td><?= $r['bureau']?></td>
                            <td><?= $r['centre']?></td>
                            <td><?= $r['circo']?></td>
                            <td><?= $r['prov']?></td>
                            <td class="d-flex p-2 align-items-end " >
                            <?php $fichier= ($r['fichier'])?>
                            <a href="../temoin/fichiers/<?=($fichier) ?>" class="but" >aperçu</a>
                            </td>
                        </tr>   
                        <?php endforeach ?>  
                    <?php ?>  


                    
                                                    
                </tbody>
            </table>
            </div>
        </div>
    </section>

</main>
    <!-- End #main -->
    <?php require_once('partials/footer.php'); ?>
    <?php } 
else
header('Location:../form/login.php')
?>