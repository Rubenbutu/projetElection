<?php
include('../function.php');
if(!isset($_SESSION)){
    session_start();
}
if(isset($_POST['candidat'])){
storeResultPanier();
header('location:formPresident.php');

}
// function storeResultPanier()
// {
   
//    $connect=new Connexion();
//    $connexion=$connect->open();
//    try{
//       $requete=$connexion->prepare('INSERT INTO panier(nbre_voix, id_bureau,num_cand) values(:voix,:bureau,:cand)');
//       $requete->execute([
         
//          'voix'=>intval($_POST['voix']),
//          'bureau'=>intval($_POST['bureau']),
//          'cand'=>intval($_POST['candidat'])
         
//       ]);
//       return "Résultat enregistré avec succès";

 
//    }
//    catch(Exception $e){
//     return "une erreur s'est produite dans l'enregistrement du résultat. Réessayez svp: <br>".$e;
//    }
 
// }
// function getresultPanier(){
//     $connect=new Connexion();
//     $connexion=$connect->open();
//     $requete=$connexion->prepare("select * from panier where user=:id");
//     $requete->execute([
//        'id'=>intval($_SESSION['utilisateur'])
//     ]);
//     return $users=$requete->fetchAll();
 
//  }

