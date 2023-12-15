

<?php require_once('partials/header2.php');
if(isset($_SESSION['utilisateur']) && !empty($_SESSION['utilisateur'])){
    ?>
   
        <!-- End Page Title -->
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tableau de Bord</h1>
        <nav >
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Ajouter un candidat</a></li>
                <li class="breadcrumb-item active">Tableau de Bord</li>

            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="row">

                    <!-- Left side columns -->
            <div class="col-lg-12">
                    <section class="order" id="order">

                    <form action=" " method="POST" enctype="multipart/form-data">
                        <div class="explication">
                            <img src="../assets/img/eazy.PNG" alt="">
                        </div>
                        <div class="inputBox ">
                                <div class="input ">
                                    <span>numéro du candidat</span>
                                    <input type="number " name="numero" placeholder="Entrez le  numero du candidat ici" required>
                                </div>
                                <div class="input ">
                                    <span>nom du candidat</span>
                                    <input type="text " name="nom" placeholder="Entrez le  nom du candidat ici " required>
                                </div>
                                <div class="input ">
                                    <span> postnom du candidat</span>
                                    <input type="text " name="post" placeholder="Entrez le postnom- du candidat ici " required>
                                </div>

                        </div>
                        <div class="inputBox ">
                            <div class="input ">
                                <span>prenom</span>
                                <input type="text " name="pre" placeholder="Entrez le prenom du candidat ici "required>
                            </div>
                            <div class="input ">
                                <span>Email du candidat</span>
                                <input type="mail " name="mail" placeholder="Entrez votre l'adresse mail du candidat ici "required>
                            </div>

                        </div>
                        <div class="inputBox ">
                            <div class="input ">
                                <span>Adrresse</span>
                                <input type="text " name="adr" placeholder="Entrez le prenom du candidat ici "required>
                            </div>
                            <div class="input ">
                                <span>téléphone</span>
                                <input type="mail " name="phone" placeholder="Entrez votre l'adresse mail du candidat ici "required>
                            </div>

                        </div>
                    


                        <div class="inputBox ">
                            <div class="input ">
                                <select name="sexe" id="" class="" aria-label="default select example" required>
                                    <option value="" selected>choisissez le sexe du candidat ici</option>
                                    <option value="1">Masculin</option>
                                    <option value="2">Feminin</option>
                                </select>
                            </div>
                            <div class="input ">
                                <select name="cat" id="" class="" aria-label="default select example" required>
                                    <option value="" selected>Président/nationnal</option>
                                    <option value="0">president</option>
                                    <option value="1">député nationnal</option>
                                </select>
                            </div>
                            <div class="input ">
                                <select name="circ" id="" class="" aria-label="default select examplerequired ">
                                    <option value="" selected>circonscription</option>
                                    <?php $cironcr= circonscription();
                                        foreach($cironcr as $cir):?>
                                    
                                        <option value="<?=$cir['id_circ']?>"><?=$cir['libelle']?></option>
                                        <?php endforeach ?>
                                </select>
                            </div>

                        </div>


                        <button type="submit "  class="btnn">envoyer</button>

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