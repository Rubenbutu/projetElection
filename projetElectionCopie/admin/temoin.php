
<?php require_once('partials/header.php');
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
        <div class="btn btn-outline-secondary mt-0 text-white "><a href="addTemoin.php">ajouter temoin</a></div>

        </div>
    </nav>
    <hr>
</div>

        <section class="section dashboard">
            <div class="row">
            <?php
            $cand=temoins();
            ?>
                <!-- Left side columns -->
                <div class="col-lg-12">
                <table   id="example6" class="table  table-bordered  table-hover w-100  text-muted" style="width:100%">
                <thead>
                    <tr>
                        <th>nom_cand</th>
                        <th>prenom_cand</th>
                        <th>sexe_cand</th>
                        <th>telephone</th>
                        <th>mail</th>
                        <th>Centre</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach($cand as $c): ?>
                    <tr>
                        <td>  <?= $c['nom_user'] ?></td>
                        <td>  <?= $c['prenom'] ?></td>
                        <td>  <?= $c['sexe'] ?></td>
                        <td>  <?= $c['telephone'] ?></td>
                        <td>  <?= $c['mail'] ?></td>
                        <td>  <?= $c['libelle_centre'] ?></td>
                        
                    </tr>
                    <?php endforeach  ?>

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