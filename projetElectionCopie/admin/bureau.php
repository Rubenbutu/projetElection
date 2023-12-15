
<?php require_once('partials/header.php');
  if(isset($_POST['nom']) && !empty($_POST['nom'])){
    storeBureau();
}

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
        <div class="btn btn-outline-primary mt-0 text-light"><a href="addBureau.php">ajouter un bureau</a></div>

        </div>
    </nav>
    <hr>
</div>

        <section class="section dashboard">
            <div class="row">
            <?php
            $cand=bureau();
            ?>
                <!-- Left side columns -->
                <div class="col-lg-12">
                <table   id="example5" class="table  table-bordered  table-hover w-100  text-muted" style="width:100%">
                <thead>
                    <tr>
                        <th>identifiant</th>
                        <th>nom du bureau</th>
                        <th>centre</th>
                        <th>circonscription</th>
                        <th>province</th>
                       

                    </tr>
                </thead>
                <tbody>
                    <?php foreach($cand as $c): ?>
                    <tr>
                        <td>  <?= $c['id'] ?></td>
                        <td>  <?= $c['bureau'] ?></td>
                        <td>  <?= $c['centre'] ?></td>
                        <td>  <?= $c['circo'] ?></td>
                        <td>  <?= $c['province'] ?></td>
                     
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
