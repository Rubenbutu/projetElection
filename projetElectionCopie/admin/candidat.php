
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
        <div class="btn btn-outline-secondary mt-0 text-white "><a href="addCand.php">ajouter candidat</a></div>

        </div>
    </nav>
    <hr>
</div>

        <section class="section dashboard">
            <div class="row">
            <?php
            $cand=table('candidat');
            ?>
                <!-- Left side columns -->
                <div class="col-lg-12">
                <table   id="example" class="table  table-bordered  table-hover w-100  text-muted table-responsive" style="width:100%">
                <thead>
                    <tr>
                        <th>nom_cand</th>
                        <th>postnom_cand</th>
                        <th>prenom_cand</th>
                        <th>sexe_cand</th>
                        <th>adresse_cand</th>
                        <!-- <th>mail</th> -->
                        <th>action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach($cand as $c): ?>
                    <tr>
                        <td>  <?= $c['nom_cand'] ?></td>
                        <td>  <?= $c['postnom_cand'] ?></td>
                        <td>  <?= $c['prenom_cand'] ?></td>
                        <td>  <?= $c['sexe_cand'] ?></td>
                        <td>  <?= $c['adresse_cand'] ?></td>
                        <!-- <td>  <?= $c['mail'] ?></td> -->
                        <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                        <a href="editer?a=<?= $c['numero'] ?>" class=""   style="  margin-top: 1rem;
                        display: inline-block;
                        /* font-size: 1.7rem; */
                        text-align:center;
                        /* color: #fff; */
                        width:100%;
                        background: var(--red);
                        border-radius: .5rem;
                        cursor: pointer;
                        /* padding: .4rem 1rem; */
                        transition: all .3s ease-in-out;
                        list-style:  none;
                        text-decoration:none"
                        >Editer</a></div></td>
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