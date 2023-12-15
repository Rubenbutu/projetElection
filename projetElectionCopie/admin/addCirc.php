
<?php require_once('partials/header2.php'); 
if(isset($_SESSION['utilisateur']) && !empty($_SESSION['utilisateur'])){
    ?>
<main id="main" class="main">

<div class="pagetitle">
    <h1>Tableau de Bord</h1>
    <nav >
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Tableau de Bord</li>

        </ol>
    </nav>
</div>

<section class="section dashboard">
    <div class="row">

                <!-- Left side columns -->
        <div class="col-lg-12">
        <section class="order " id="order">


<form action=" " method="POST">

    
    <div class="inputBox ">
        <div class="input ">
            <span>Le nom de la circonscription</span>
            <input type="text " placeholder="Entrez le nom de la circonscription  " name="nom" required>
        </div>
        <div class="input ">
        <span>Choisir la province</span>
            
            <select name="province" id="cmbP" class="" aria-label="default select example" name="centre" required>
            <option value="" >la province</option>
            <option value="BAS_UELE" >BAS UELE</option>
            <option value="EQUATEUR" >EQUATEUR>
            <option value="HAUT-KATANGA" >HAUT-KATANGA</option>
            <option value="HAUT-LOMAMI" >HAUT-LOMAMI</option>
            <option value="HAUT-UELE" >HAUT-UELE</option>
            <option value="ITURI" >ITURI</option>
            <option value="KASAI" >KASAI</option>
            <option value="KASAI_CENTRAL" >KASAI_CENTRAL</option>
            <option value="KASAI_ORIENTAL" >KASAI_ORIENTAL</option>
            <option value="KINSHASA" >KINSHASA</option>
            <option value="KONGO_CENTRAL" >KONGO_CENTRAL</option>
            <option value="KWANGO" >KWANGO</option>
            <option value="KWILU" >KWILU</option>
            <option value="LOMAMI" >LOMAMI</option>
            <option value="LUALABA" >LUALABA</option>
            <option value="MAI-NDOME" >KWANGO</option>
            <option value="KWANGO" >MAI-NDOME</option>
            <option value="MANIEMA" >MANIEMA</option>
            <option value="MONGALA" >MONGALA</option>
            <option value="NORD-KIVU" >NORD-KIVU</option>
            <option value="NORD-UBANGI" >NORD-UBANGI</option>
            <option value="SANKURU" >SANKURU</option>
            <option value="SUD-KIVU" >SUD-KIVU</option>
            <option value="SUD-UBANGI" >SUD-UBANGI</option>
            <option value="TANGANYIKA" >TANGANYIKA</option>
            <option value="TSHOPO" >TSHOPO</option>
            <option value="TSHUAPA" >TSHUAPA</option>
           

               
            </select>
        </div>

    </div>
    <div class="inputBox ">
        <div class="input ">
            <span>Territoire</span>
            <input type="text " placeholder="Entrez le territoire de votre circonscription " name="territoire" required>
        </div>
       

    </div>


   

    <button type="submit " value="Envoyer " class="btn">Envoyer</button>

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
