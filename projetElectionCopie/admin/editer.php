
<?php require_once('partials/header2.php'); 
if(isset($_SESSION['utilisateur']) && !empty($_SESSION['utilisateur'])){
    ?>
<?php 
    $candidats=getCandidatwhereId();
    if(isset($_POST['nom']) && !empty($_POST['nom']))
    $a=updateCandidat();

   
    
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
                
            <div class="content">

<div class="d-flex justify-content-center align-items-center ">


    <!-- header section starts      -->



    <!-- order section starts  -->

    <section class="order " id="order">

        <!-- <h3 class=" sub-heading "> Nous écrire</h3> -->
        <!-- <h1 class="heading text-center"> Création d'un nouvel article </h1> -->


        <form action=" " method="POST" enctype="multipart/form-data">
            <div class="explication">
                <img src="../assets/img/eazy.PNG" alt="">
            </div>
            <div class="inputBox ">
            <div class="input ">
                    <span>numéro du candidat</span>
   
                    <input type="number " name="numero" placeholder="Entrez le  numero du candidat ici" required value=" <?= $candidats["numero"] ;  ?>">
                </div>
                <div class="input ">
                    <span>nom du candidat</span>
                    <input type="text " name="nom" placeholder="Entrez le  nom du candidat ici " required value=" <?= $candidats["nom_cand"] ;  ?>">
                </div>
                <div class="input ">
                    <span> postnom du candidat</span>
                    <input type="text " name="post" placeholder="Entrez le postnom- du candidat ici " required value=" <?= $candidats["postnom_cand"] ;  ?>">
                </div>

            </div>
            <div class="inputBox ">
                <div class="input ">
                    <span>prenom</span>
                    <input type="text " name="pre" placeholder="Entrez le prenom du candidat ici "required value=" <?= $candidats["prenom_cand"] ;  ?>">
                </div>
                <div class="input ">
                    <span>Email du candidat</span>
                    <input type="mail " name="mail" placeholder="Entrez votre l'adresse mail du candidat ici "required value=" <?= $candidats["mail"] ;  ?>">
                </div>

            </div>
            <div class="inputBox ">
                <div class="input ">
                    <span>Adrresse</span>
                    <input type="text " name="adr" placeholder="Entrez le prenom du candidat ici "required value=" <?= $candidats["adresse_cand"] ;  ?>">
                </div>
                <div class="input ">
                    <span>téléphone</span>
                    <input type="mail " name="phone" placeholder="Entrez votre l'adresse mail du candidat ici "required value=" <?= $candidats["telephone"] ;  ?>">
                </div>

            </div>
          


            <div class="inputBox ">
                <div class="input ">
                    <select name="sexe" id="" class="" aria-label="default select example" required>
                        <option >choisissez le sexe du candidat ici</option>
                        <option value="1" <?= ($candidats['sexe_cand']=="M")? "selected":"" ?>>Masculin</option>
                        <option value="2" <?= ($candidats['sexe_cand']=="F")? "selected":"" ?>>Feminin</option>
                    </select>
                </div>
                <div class="input ">
                    <select name="cat" id="" class="" aria-label="default select example" required>
                        <option value="" selected>Président/nationnal</option>
                        <option value="0" <?= ($candidats['id_cat']==0)? "selected":"" ?>>president</option>
                        <option value="1" <?= ($candidats['id_cat']==1)? "selected":"" ?>>député nationnal</option>
                    </select>
                </div>
                

            </div>


            <button type="submit "  class="btnn">Modifier</button>

        </form>

    </section>

    <!-- order section ends -->


</div>


</div>
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