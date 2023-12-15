

<?php 
require_once('partials/header2.php');
if(isset($_SESSION['utilisateur']) && !empty($_SESSION['utilisateur'])){
    if(isset($_POST['nom']) && !empty($_POST['nom'])){
        storeCentre();
    }
    ?>
        <!-- End Page Title -->
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tableau de Bord</h1>
        <nav >
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Ajouter un Centre</a></li>
                <li class="breadcrumb-item active">Tableau de Bord</li>

            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="row">

                    <!-- Left side columns -->
            <div class="col-lg-12">
                  
            <section class="order " id="order">

<!-- <h3 class=" sub-heading "> Nous écrire</h3> -->
<!-- <h1 class="heading text-center"> Création d'un nouvel article </h1> -->


<form action=" " method="POST" enctype="multipart/form-data">
    <!-- <div class="explication">
        <img src="../images/eazy.PNG" alt="">
    </div> -->
  
 


    <div class="inputBox ">
    <div class="input " >
            <span>Le nom du Centre</span>
            <input type="text " placeholder="Entrez le nom du Centre ici "name="nom" required>
        </div>
        <div class="input ">
        <span>Le nom du Centre</span>
            
            <select  id="" class="" aria-label="default select example" name="id" required>
                <option value="" selected>circonscription</option>
                <?php
                    $table=table("circonscription");
                    foreach($table as $tab):
                    ?>
                        <option value="<?= $tab['id_circ'] ?>" ><?= $tab['libelle'] ?></option>
                    
                <?php endforeach ?>
            </select>
        </div>

    </div>
    


    <button type="submit " value="Envoyer " class="btnn" name="bot">Envoyer</button>

</form>

</section>


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