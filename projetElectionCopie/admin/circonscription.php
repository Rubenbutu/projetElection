
<?php require_once('partials/header.php'); ?>
<main id="main" class="main">

<div class="pagetitle">
    <h1>Tableau de Bord</h1>
    <nav class="d-flex justify-content-between">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Tableau de Bord</li>

        </ol>
        <div>
        <div class="btn btn-outline-primary mt-0 text-light"><a href="addCirc.php">ajouter circonscription</a></div>

        </div>
    </nav>
    <hr>
</div>

        <section class="section dashboard">
            <div class="row">
            <?php
            $cand=table('circonscription');
            ?>
                <!-- Left side columns -->
                <div class="col-lg-12">
                <table   id="example" class="table  table-bordered  table-hover w-100  text-muted" style="width:100%">
                <thead>
                    <tr>
                        <th>identifiant</th>
                        <th>nom_circ</th>
                        <th>province</th>
                        <th>territoire</th>
                       

                    </tr>
                </thead>
                <tbody>
                    <?php foreach($cand as $c): ?>
                    <tr>
                        <td>  <?= $c['id_circ'] ?></td>
                        <td>  <?= $c['libelle'] ?></td>
                        <td>  <?= $c['province'] ?></td>
                        <td>  <?= $c['territoire'] ?></td>
                     
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
