<?php
include('Connexion.php');

session_start();
auth();


function auth()
{
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->prepare('select * from utilisateur where passeword LIKE  "%":pass "%" and nom_user LIKE "%" :nom "%" and type<>1');
   $requete->execute([
      'nom'=>$_POST['nom_user'],
      'pass'=>$_POST['password'],
   ]);
   $i=0;
 
   foreach($requete as $t){
               if($t['nom_user']!=""){
                  $_SESSION['utilisateur']=$t['id_user'];
                
               $i++;
               }
            }
   if($i===0){
      $requet=$connexion->prepare('select * from utilisateur where passeword LIKE  "%":pas "%" and nom_user LIKE "%" :n "%"');
      $requet->execute([
         'n'=>$_POST['nom_user'],
         'pas'=>$_POST['password'],
      ]);
      $i=0;
   
      foreach($requet as $tt){
                  if($tt['nom_user']!=""){
                     $_SESSION['utilisateur']=$tt['id_user'];
                  
                  $i++;
                  }
               }
      if($i===0){
         $_SESSION['erreur']="mot de pass ou nom incorrect";
         header('Location:form/login.php');

      }
      else{
         header("Location:admin/result.php");
         
     }

     
  }else{
      
      header("Location:temoin/formPresident.php");
      
  }
}


 
