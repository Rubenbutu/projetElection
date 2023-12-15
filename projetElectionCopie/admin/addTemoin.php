

<?php require_once('partials/header2.php');
if(isset($_SESSION['utilisateur']) && !empty($_SESSION['utilisateur'])){
    ?>
<?php
// require("../connexion.php");
if(isset($_FILES['photo']) && !empty($_FILES['photo'])){
    
            if($_FILES["photo"]["error"]===4){
                echo "<script> alert('l'image n'existe pas');</script>";
            }
            else
            {
                $fileName=$_FILES['photo']['name'];
                $fileSize=$_FILES['photo']['size'];
                $tmpName=$_FILES['photo']['tmp_name'];
                echo $tmpName;
                $validImageExtension=['jpg','jpeg','png'];
                $imgExtension=explode('.',$fileName);
                $imgExtension=strtolower(end($imgExtension));
                if(!in_array($imgExtension,$validImageExtension)){
                    echo "<script> alert('le format d'image n'est pas pris en compte');</script>";
        
                }
                if($fileSize>1000000){
                echo "<script> alert('la taille de l'image est trop grande');</script>";
        
                }
                else{
                    $newImageName=uniqid();
                    $newImageName.='.'. $imgExtension;
                    try{
                    move_uploaded_file($tmpName,'users/'.$newImageName);

                    }catch(Exception $e){
                    echo "<script> alert('une petite erreur non comprise');</script>";

                    }
                    echo $newImageName;
                    $connect=new Connexion();
                    $connexion=$connect->open();
                    try{
                        $requete=$connexion->prepare('INSERT INTO utilisateur(nom_user,postnom,prenom,sexe,adresse_user,telephone,mail,passeword,type,id_centre,photo)
                        values(:nom,:post,:pre,:sexe,:adr,:phone,:mail,:pass,:type,:centre,:pho)');
                       $requete->execute([
                          
                          'nom'=>($_POST['nom']),
                          'post'=>($_POST['post']),
                          'pre'=>($_POST['pre']),
                          'sexe'=>($_POST['sexe']),
                          'adr'=>($_POST['adr']),
                          'phone'=>($_POST['phone']),
                          'mail'=>($_POST['mail']),
                          'pass'=>intval($_POST['password']),
                          'type'=>intval($_POST['type']),
                          'centre'=>intval($_POST['centre']),
                          'pho'=>$newImageName,
                 
                          
                       ]);
                     echo "<script>alert('utilisateur enregistré avec succès')</script>";
        
                 
                  
                    }
                    catch(Exception $e){
                     echo "<script> alert('Une erreur lors de l'enregistrement du fichier');</script>";
                    
                    }
        
                }
            }

        }
   

            
?>
   
        <!-- End Page Title -->
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tableau de Bord</h1>
        <nav >
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Ajouter un temoin</a></li>
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
            <span>Le nom du témoin</span>
            <input type="text " placeholder="Entrez le nom du témoin ici "name="nom" required>
        </div>
        <div class="input " >
            <span>Le postnom du témoin</span>
            <input type="text " placeholder="Entrez le postnom ici " name="post" required>
        </div>

    </div>
    <div class="inputBox ">
        <div class="input ">
            <span>prenom du témoin</span>
            <input type="text " placeholder="Entrez le prenom ici " name="pre" required>
        </div>
        <div class="input ">
        <span>choisir le sexe</span>

            <select name="sexe" id="" class="" aria-label="default select example" required>
                <option value="M">Masculin</option>
                <option value="F">Feminin</option>
            </select>
        </div>

    </div>
    <div class="inputBox ">
        <div class="input ">
            <span>L'adresse du témoin</span>
            <input type="text " placeholder="Entrez l'adresse ici " name="adr" required>
        </div>
        <div class="input ">
            <span>le numéro de téléphone</span>
            <input type="text " placeholder="Entrez le n uméro de téléphone ici " name="phone" required>
        </div>

    </div>
    <div class="inputBox ">
        <div class="input ">
            <span>L'adresse mail</span>
            <input type="mail " placeholder="Entrez l'adresse ici " name="mail" required>
        </div>
        <div class="input ">
            <span>mot de passe</span>
            <input type="password " placeholder=" " name="password" required>
        </div>

    </div>



    <div class="inputBox ">
        <div class="input ">
            <select name="type" id="" class="" aria-label="default select example" name="type" required>
                <option value="" selected>type</option>
                <option value="0">témoin</option>
                <option value="1">Administrateur</option>
            </select>
        </div>
        <div class="input ">
            <select name="centre" id="" class="" aria-label="default select example" name="centre" required>
                <option value="" selected>Le centre d'affectation</option>
                <?php
                    $table=table("centre");
                    foreach($table as $tab):
                    ?>
                        <option value="<?= $tab['id_centre'] ?>" ><?= $tab['libelle_centre'] ?></option>
                    
                <?php endforeach ?>
            </select>
        </div>

    </div>
    <div class="inputBox ">

        <div class="input ">
    <span>Le fichier image</span>

            <input type="file" name="photo">
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