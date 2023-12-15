<?php
if(isset($_POST['image'])){
 
    
            if($_FILES["image"]["error"]===4){
                echo "<script> alert('l'image n'existe pas');</script>";
            }
            else
            {
                $fileName=$_FILES['image']['name'];
                $fileSize=$_FILES['image']['size'];
                $tmpName=$_FILES['image']['tmp_name'];
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
                    move_uploaded_file($tmpName,'fichiers/'.$newImageName);
                    echo $newImageName;
                    $panier=getPanier();
                    $connect=new Connexion();
                    $connexion=$connect->open();
                    foreach($panier as $p){
                       
                        try{
                           $requete=$connexion->prepare('INSERT INTO resultat(nbre_voix, id_bureau,num_cand,fichier) values(:voix,:bureau,:cand,:fic)');
                           $requete->execute([
                              
                              'voix'=>intval($p['nbre_voix']),
                              'bureau'=>intval($p['id_bureau']),
                              'cand'=>intval($p['num_cand']),
                              'fic'=>$newImageName
                              
                           ]);
                            echo "<script> alert('Enregistrement réussi');</script>";
            
                           
                      
                        }
                        catch(Exception $e){
                         echo "<script> alert('Une erreur lors de l'enregistrement du fichier');</script>";
                        
                        }
                    }
               
        
                }
            }

        }
   

            
?>