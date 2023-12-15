
<?php require_once('partials/header.php'); ?>
<?php 
   
    $nbre=null;
    $presBur=null;
    $presCent=null;
    $presCirc=null;
    // $respr=getClassementpresidentiel();
    if(isset($_POST['presCirc']) && !empty($_POST['presCirc'])) {
        $presCirc=getClassementNatCirc($_POST['presCirc']);
        $rp=getVotantNatCirc($_POST['presCirc']);
       foreach($rp as $r) 
       $nbre=$r['voix'];
    }
 

    if(isset($_POST['presCent']) && !empty($_POST['presCent'])){
        $presCent=getClassementNatCentre($_POST['presCent']);
        $rp=getVotantNatCentre($_POST['presCent']);
       foreach($rp as $r) 
       $nbre=$r['voix'];
    }
   
    if(isset($_POST['presBur']) && !empty($_POST['presBur'])){
    $presBur=getClassementNatBureau($_POST['presBur']);
     $rp=getVotantNatBureau($_POST['presBur']);
    foreach($rp as $r) 
    $nbre=$r['voix'];
    }

?>
<main id="main" class="main">

    <section class="section dashboard">
    <div class="row">

<form action="" class="form" method="POST">

<div class="row d-flex ">
        
        
        <div class="col-md-4">
            <div class="form-group shadow  mt-3 mb-5 p-4">
                <!-- <input type="text" class="form-control mb-2 fs-3 " name="circonscription" placeholder="résultat par circonscription" value="<?= isset($_POST['circonscription'])? $_POST['circonscription']:"" ?>" >                 -->
                <select name="presCirc" id="cmbSc" class="form-select fs-5" aria-label="default select example">
                    <option value="" >Circonscription</option>

                        <?php
                        $table=table("circonscription");
                        foreach($table as $tab):
                        ?>
                         <option value="<?= $tab['libelle'] ?>" ><?= $tab['libelle'] ?></option>
       
                            <?php endforeach ?>
                        </select>
                <button type="submit" class="btn btn-outline-primary mt-1" name="btncirc">envoyer</button>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group shadow  mt-3 mb-5 p-4">
                <!-- <input type="text" class="form-control mb-2 fs-3" name="centre" placeholder="résultat par nom du centre" value="<?= isset($_POST['centre'])? $_POST['centre']:"" ?>">                 -->
                <select name="presCent" id="cmbSce" class="form-select fs-5" aria-label="default select example">
                    <option value="" >centre concerné</option>

                        <?php
                        $table=table("centre");
                        foreach($table as $tab):
                        ?>
                            <option value="<?= $tab['libelle_centre'] ?>" ><?= $tab['libelle_centre'] ?></option>
                        
                        <?php endforeach ?>
                    </select>
                <button type="submit" class="btn btn-outline-primary mt-1" name="btncentre">envoyer</button>
            </div>
        </div>
       
        <div class="col-md-4">
            <div class="form-group shadow  mt-3 mb-5 p-4">
                <!-- <input type="text" class="form-control mb-2 fs-3" name="bureau" placeholder="résultat par nom du bureau" value="<?= isset($_POST['bureau'])? $_POST['bureau']:"" ?>"  value="<?= isset($_POST['bureau'])? $_POST['bureau']:"" ?>"> -->
                <select name="presBur" id="cmbSb" class="form-select fs-5" aria-label="default select example">
<option value="" >Bureau concerné</option>

    <?php
    $table=table("bureau");
    foreach($table as $tab):
     ?>
        <option value="<?= $tab['libelle_bureau'] ?>" ><?= $tab['libelle_bureau'] ?></option>
       
     <?php endforeach ?>
    </select>
                <button type="submit" class="btn btn-outline-primary mt-1" name="btnbureau">envoyer</button>
            </div>
        </div>
            
    </div>


</form>
 </div>
 <div class="row">


<div class="col-md-7 shadow h-100">
    <h4 class="fs-4 "><?php
        if(isset($_POST['presProv']) && !empty($_POST['presProv'])){
            echo "Classement/Province de ".$_POST['presProv'];
        }
       else if(isset($_POST['presCirc']) && !empty($_POST['presCirc'])){
            echo "Classement/Circonscription de ".$_POST['presCirc'];
        }
       else if(isset($_POST['presCent']) && !empty($_POST['presCent'])){
            echo "Classement/Centre ". $_POST['presCent'];
        }
       else if(isset($_POST['presBur']) && !empty($_POST['presBur'])){
            echo "Classement/Bureau ".$_POST['presBur'];
        }
        else
        echo "";
    ?> </h4>
    
    <h4>total: <?= $nbre;?> votants</h4>
    <h4>Classement</h4>

    <div class="table">
        <table class="table  datatable" id="example4" style="width: 100%;">
            <thead>
                <tr>
                <td class="text-center ">numero</td>
                <td class="text-center ">candidat</td>
                <td class="text-center ">Nbre Voix</td>
                <td class="text-center ">Pourcentage</td>
                </tr>
            <tbody>
            <?php 
   
         if(isset($_POST['presProv']) && !empty($_POST['presProv'])){
                 
        ?> 

                <?php foreach($presProv as $pr): ?>
                    <tr>

                        <td><?=$pr['numero'] ?></td>
                        <td><?=$pr['nom'].' '.$pr['post'] ?></td>
                        <td><?=$pr['voix'] ?></td>
                        <td><?=(intval($pr['voix'])/intval($nbre))*100 ?>%</td>
                    </tr>
                <?php
                    $nom[]=$pr['nom'];
                    $pourcent[]=(intval($pr['voix'])/intval($nbre))*100 ;
                endforeach ;
                $entree=countcirco();
                foreach($entree as $e)
                $ent=$e['sum'];}
else if(isset($_POST['presCirc']) && !empty($_POST['presCirc'])){

           
  ?> 

          <?php foreach($presCirc as $pr): ?>
              <tr>

                  <td><?=$pr['numero'] ?></td>
                  <td><?=$pr['nom'].' '.$pr['post'] ?></td>
                  <td><?=$pr['voix'] ?></td>
                  <td><?=(intval($pr['voix'])/intval($nbre))*100 ?>%</td>
              </tr>
          <?php
              $nom[]=$pr['nom'];
              $pourcent[]=(intval($pr['voix'])/intval($nbre))*100 ;
          endforeach ;
          $entree=countcirco();
          foreach($entree as $e)
          $ent=$e['sum'];}

  else if(isset($_POST['presBur']) && !empty($_POST['presBur'])){

   
           
  ?> 

          <?php foreach($presBur as $pr): ?>
              <tr>

                  <td><?=$pr['numero'] ?></td>
                  <td><?=$pr['nom'].' '.$pr['post'] ?></td>
                  <td><?=$pr['voix'] ?></td>
                  <td><?=(intval($pr['voix'])/intval($nbre))*100 ?>%</td>
              </tr>
          <?php
              $nom[]=$pr['nom'];
              $pourcent[]=(intval($pr['voix'])/intval($nbre))*100 ;
          endforeach ;
          $entree=countcirco();
          foreach($entree as $e)
          $ent=$e['sum'];}

  else if(isset($_POST['presCent']) && !empty($_POST['presCent'])){  
  ?> 

          <?php foreach($presCent as $pr): ?>
              <tr>

                  <td><?=$pr['numero'] ?></td>
                  <td><?=$pr['nom'].' '.$pr['post'] ?></td>
                  <td><?=$pr['voix'] ?></td>
                  <td><?=(intval($pr['voix'])/intval($nbre))*100 ?>%</td>
              </tr>
          <?php
              $nom[]=$pr['nom'];
              $pourcent[]=(intval($pr['voix'])/intval($nbre))*100 ;
          endforeach ;
          $entree=countcirco();
          foreach($entree as $e)
          $ent=$e['sum'];}
         

?>


            

        




                

            </tbody>
        </table>
    </div>
    
</div>
        <div class="col-md-5" style="overflow-x: scroll;">
            <div class="">
                <div class="card">
                    <div class="card-body bg-body-tertiary">
                        <h6 class="card-title">Réprésentation graphique</h6>
                        <canvas id="barCanvas"></canvas>
                    </div>
                </div>
            </div>
        
        </div>

    </div> 





</div>
</div>

</div>
</div>

</main>
    <!-- End #main -->
    <?php require_once('partials/footer.php'); ?>
