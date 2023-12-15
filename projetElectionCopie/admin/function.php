<?php
session_start();
include('Connexion.php');
function all(int $cat)
{
   // Récupéreau le bureau du témoin
   $temoins=utilisateur();
   $id=0;
   foreach($temoins as $t){
      $id=$t['circonscription'];
   }
   // die(intval($id));
   // fin récupération
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->prepare("select numero, nom_cand, postnom_cand, prenom_cand, sexe_cand, id_cat from candidat cand inner join circonscription circ on cand.id_circ=circ.id_circ where circ.id_circ=:id and cand.id_cat=:cat");
   $requete->execute([
      'id'=>intval($id),
      'cat'=>intval($cat)
   ]);
   return $categories=$requete->fetchAll();
}
function temoins()
{
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->prepare("select u.nom_user, u.prenom,u.sexe,u.telephone,u.mail, circ.id_circ circonscription,ct.id_centre centre  from utilisateur u inner join centre ct on u.id_centre=ct.id_centre inner join circonscription circ on ct.id_circ=circ.id_circ where u.type=:id");
   $requete->execute([
      'id'=>0
   ]);
   return $users=$requete->fetchAll();
}

function utilisateur()
{
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->prepare("select u.nom_user, u.prenom, circ.id_circ circonscription,ct.id_centre centre,ct.libelle_centre  from utilisateur u inner join centre ct on u.id_centre=ct.id_centre inner join circonscription circ on ct.id_circ=circ.id_circ where u.id_user=:id");
   $requete->execute([
      'id'=>intval($_SESSION['utilisateur'])
   ]);
   return $users=$requete->fetch();
}

function circonscription()
{
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->prepare("select * from circonscription");
   $requete->execute([
      'id'=>intval($_SESSION['utilisateur'])
   ]);
   return $users=$requete->fetchAll();
}
function candidat()
{
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->query("select * from candidat");
 
   return $users=$requete->fetchAll();
}
function centre()
{
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->query("select c.id_centre id, c.libelle_centre centre, circ.libelle circo, circ.province province from centre c
   inner join circonscription circ on c.id_circ=circ.id_circ");
 
   return $users=$requete->fetchAll();
}
function bureau()
{
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->query("select b.id_bureau id, b.libelle_bureau bureau, c.libelle_centre centre, circ.libelle circo,circ.province province from bureau b
  inner join centre c on c.id_centre=b.id_centre
inner join circonscription circ on c.id_circ=circ.id_circ");
 
   return $users=$requete->fetchAll();
}
function getCandidatwhereId()
{
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->prepare("select * from candidat where numero=:id");
   $requete->execute([
      'id'=>intval($_GET['a'])
   ]);
 
   return $users=$requete->fetch();
}
function table(string $tab)
{
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->prepare("select * from $tab");
   $requete->execute([
      'id'=>intval($_SESSION['utilisateur'])
   ]);
   return $users=$requete->fetchAll();
}
function province()
{
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->prepare("select DISTINCT(province) from circonscription");
   $requete->execute([
      'id'=>intval($_SESSION['utilisateur'])
   ]);
   return $users=$requete->fetchAll();
}


// **********************************************
// Enregistrement
function storeCentre()
{
   
   $connect=new Connexion();
   $connexion=$connect->open();
   try{
      $requete=$connexion->prepare('insert into centre(libelle_centre, id_circ) values(:nom,:id)');
      $requete->execute([
         
         // 'num'=>intval($_POST['num']),
         'nom'=>($_POST['nom']),
         'id'=>intval($_POST['id']),
         

         
      ]);
    echo "<script>alert('Centre Enregistré avec succès')</script>";

 
   }
   catch(Exception $e){
      echo "<script>alert('erreur')</script>";

   }
 
}
function storeBureau()
{
   
   $connect=new Connexion();
   $connexion=$connect->open();
   try{
      $requete=$connexion->prepare('insert into bureau(libelle_bureau, id_centre)
       values(:nom,:id)');
      $requete->execute([
         
         // 'num'=>intval($_POST['num']),
         'nom'=>($_POST['nom']),
         'id'=>intval($_POST['id']),
         

         
      ]);
    echo "<script>alert('Centre Enregistré avec succès')</script>";

 
   }
   catch(Exception $e){
      echo "<script>alert('erreur')</script>";

   }
 
}

function storeResult()
{
   
   $connect=new Connexion();
   $connexion=$connect->open();
   try{
      $requete=$connexion->prepare('INSERT INTO resultat(nbre_voix, id_bureau,num_cand) values(:voix,:bureau,:cand)');
      $requete->execute([
         
         'voix'=>intval($_POST['voix']),
         'bureau'=>intval($_POST['bureau']),
         'cand'=>intval($_POST['candidat'])
         
      ]);
      return "Résultat enregistré avec succès";

 
   }
   catch(Exception $e){
    return "une erreur s'est produite dans l'enregistrement du résultat. Réessayez svp: <br>".$e;
   }
 
}
function storeCirc()
{
   
   $connect=new Connexion();
   $connexion=$connect->open();
   try{
      $requete=$connexion->prepare('INSERT INTO circonscription(libelle, province,territoire) values(:voix,:bureau,:cand)');
      $requete->execute([
         
         'voix'=>htmlentities($_POST['nom']),
         'bureau'=>htmlentities($_POST['province']),
         'cand'=>htmlentities($_POST['territoire'])
         
      ]);
      return "Résultat enregistré avec succès";

 
   }
   catch(Exception $e){
    return "une erreur s'est produite dans l'enregistrement du résultat. Réessayez svp: <br>".$e;
   }
 
}
function deleteCandidat()
{
   
   $connect=new Connexion();
   $connexion=$connect->open();
   try{
      $requete=$connexion->prepare('delete from candidat where numero=:id');
      $requete->execute([
         
         'id'=>htmlentities($_GET['id']),
         
         
      ]);
      return "Résultat enregistré avec succès";

 
   }
   catch(Exception $e){
    return "une erreur s'est produite dans l'enregistrement du résultat. Réessayez svp: <br>".$e;
   }
 
}

function updateCandidat()
{
   
   $connect=new Connexion();
   $connexion=$connect->open();
   try{
      $requete=$connexion->prepare('update candidat set numero=:num, nom_cand=:nom,postnom_cand=:post,
      prenom_cand=:pre , 
      sexe_cand=:sexe,adresse_cand=:adr, mail=:mail, telephone=:phone,id_cat=:cat
       where numero=:id');
      $requete->execute([
         
      // 'num'=>intval($_POST['num']),
      'num'=>intval($_POST['numero']),
      'nom'=>($_POST['nom']),
      'post'=>($_POST['post']),
      'pre'=>($_POST['pre']),

      'sexe'=>($_POST['sexe']),
      'adr'=>($_POST['adr']),
      'mail'=>($_POST['mail']),
      'phone'=>($_POST['phone']),
      // 'circ'=>intval($_POST['circ']),
      'cat'=>intval($_POST['cat']),
      'id'=>intval($_GET['a']),

         
      ]);
    echo "<script>alert('Modification effectuée  avec succès')</script>";

 
   }
   catch(Exception $e){
      echo "<script>alert('erreur')</script>";
      // echo $e;
      return "erreu". " ".$e;

   }
 
}

function storecandidat()
{
   
   $connect=new Connexion();
   $connexion=$connect->open();
   try{
      $requete=$connexion->prepare('INSERT INTO candidat(numero, nom_cand,postnom_cand,prenom_cand , sexe_cand,adresse_cand, mail, telephone,id_circ,id_cat)
       values(:num,:nom,:post,:pre,:sexe,:adr,:mail,:phone,:circ,:cat)');
      $requete->execute([
         
         // 'num'=>intval($_POST['num']),
         'num'=>intval($_POST['numero']),
         'nom'=>($_POST['nom']),
         'post'=>($_POST['post']),
         'pre'=>($_POST['pre']),

         'sexe'=>($_POST['sexe']),
         'adr'=>($_POST['adr']),
         'mail'=>($_POST['mail']),
         'phone'=>($_POST['phone']),
         'circ'=>intval($_POST['circ']),
         'cat'=>intval($_POST['cat']),

         
      ]);
    echo "<script>alert('candidat enregistré avec succès')</script>";

 
   }
   catch(Exception $e){
      echo "<script>alert('erreur')</script>";

   }
 
}
function storeTemoin()
{
   
   $connect=new Connexion();
   $connexion=$connect->open();
   try{
      $requete=$connexion->prepare('INSERT INTO utilisateur(nom_user,postnom,prenom,sexe,adresse_user,telephone,mail,passeword,type,id_centre)
       values(:nom,:post,:pre,:sexe,:adr,:phone,:mail,:pass,:type,:centre)');
      $requete->execute([
         
         // 'id'=>3,
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

         
      ]);
    echo "<script>alert('utilisateur enregistré avec succès')</script>";

 
   }
   catch(Exception $e){
      echo "<script>alert('erreur')</script>"." ".$e;

   }
 
}

function storebulletin()
{
   $temoins=utilisateur();
   $id=0;
   foreach($temoins as $t){
      $id=$t['bureau'];
   }
   $connect=new Connexion();
   $connexion=$connect->open();
   try{
      $requete=$connexion->prepare('INSERT INTO bulletin(total,type, id_bureau) values(:total,:tp,:bureau)');
      $requete->execute([
         'total'=>intval($_POST['presidentiel']),
         'tp'=>"presidentiel",
         'bureau'=>intval($id),
         
      ]);
      // return $a="Résultat enregistré avec succès";

 
   }
   catch(Exception $e){
    return $a="une erreur s'est produite dans l'enregistrement du résultat. Réessayez svp: <br>";
   }
   try{
      $requete=$connexion->prepare('INSERT INTO bulletin(total,type, id_bureau) values(:total,:tp,:bureau)');
      $requete->execute([
         'total'=>intval($_POST['nationnal']),
         'tp'=>"nationnal",
         'bureau'=>intval($id),
         
      ]);
      // return $a="Résultat enregistré avec succès";

 
   }
   catch(Exception $e){
    return $a="une erreur s'est produite dans l'enregistrement du résultat. Réessayez svp: <br>";
   }
   try{
      $requete=$connexion->prepare('INSERT INTO bulletin(total,type, id_bureau) values(:total,:tp,:bureau)');
      $requete->execute([
         'total'=>intval($_POST['provincial']),
         'tp'=>"provincial",
         'bureau'=>intval($id),
         
      ]);
      // return $a="Résultat enregistré avec succès";

 
   }
   catch(Exception $e){
    return $a="une erreur s'est produite dans l'enregistrement du résultat. Réessayez svp: <br>";
   }
 
}
// ****************************************************************

function getBureaux(){
 
   // Récupéreau le bureau du témoin
   $temoins=utilisateur();
   $id=0;
   foreach($temoins as $t){
      $id=$t['centre'];
   }
   // die(intval($id));
   // fin récupération
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->prepare("select b.id_bureau bur, b.libelle_bureau bureau from bureau b inner join centre ct on b.id_centre=ct.id_centre where ct.id_centre=:id ");
   $requete->execute([
      'id'=>intval($id),
   ]);
   return $categories=$requete->fetchAll();

}
// **************************************************************************
function verifyAlreadyInserted(){
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->prepare(" select * from resultat where id_bureau=:bur and num_cand=:num");
   $requete->execute([
      'bur'=>intval($_POST['bureau']),
      'num'=>intval($_POST['candidat']),
   ]);
   $i=0;
   foreach($requete as $r){
      $i++;
   }
   if($i!=0)
return 1;
   else
   return 0;
}
function getresult(){
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->query("select cand.numero numero,cand.nom_cand nom, r.nbre_voix voix,r.fichier fichier, b.libelle_bureau bureau, c.libelle_centre centre ,circ.libelle circo, circ.province prov
   from candidat cand inner join resultat r on cand.numero=r.num_cand inner join bureau b on r.id_bureau=b.id_bureau inner join centre c on b.id_centre=c.id_centre inner join circonscription circ on c.id_circ=circ.id_circ order by voix desc");
   // $requete->execute([
   //    'id'=>intval($_SESSION['utilisateur'])
   // ]);
   return $users=$requete->fetchAll();

}
function getPresidents(){
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->prepare("select * from candidat where id_cat=:id");
   $requete->execute([
      'id'=>0
   ]);
   return $users=$requete->fetchAll();

}
function getNationnaux(){
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->prepare("select * from candidat where id_cat=:id");
   $requete->execute([
      'id'=>1
   ]);
   return $users=$requete->fetchAll();

}
function getResultCentre(string $a){
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->prepare('select cand.numero numero,cand.nom_cand nom, r.nbre_voix voix, b.libelle_bureau bureau, c.libelle_centre centre,circ.libelle circo,circ.province prov
   from candidat cand inner join resultat r on cand.numero=r.num_cand inner join bureau b on r.id_bureau=b.id_bureau inner join centre c on b.id_centre=c.id_centre
   inner join circonscription circ on c.id_circ=circ.id_circ
   where c.libelle_centre REGEXP "^" :id "$" order by voix desc');
   $requete->execute([
      'id'=>$a
   ]);
   return $users=$requete->fetchAll();

}
function getResultBureau(string $a){
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->prepare('select cand.numero numero,cand.nom_cand nom, r.nbre_voix voix, b.libelle_bureau bureau, c.libelle_centre centre, circ.libelle circo,circ.province prov
   from candidat cand inner join resultat r on cand.numero=r.num_cand inner join bureau b on r.id_bureau=b.id_bureau inner join centre c on b.id_centre=c.id_centre
   inner join circonscription circ on c.id_circ=circ.id_circ
   where b.libelle_bureau REGEXP "^" :id "$" order by voix desc');
   $requete->execute([
      'id'=>$a
   ]);
   return $users=$requete->fetchAll();

}
function getResultCirconscription(string $a){
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->prepare('select cand.numero numero,cand.nom_cand nom, r.nbre_voix voix, b.libelle_bureau bureau, c.libelle_centre centre,cir.libelle circo, cir.province prov
   from candidat cand inner join resultat r on cand.numero=r.num_cand inner join bureau b on r.id_bureau=b.id_bureau inner join centre c on b.id_centre=c.id_centre inner join circonscription cir on c.id_circ=cir.id_circ
   where cir.libelle REGEXP "^":id"$" order by voix desc');
   $requete->execute([
      'id'=>$a
   ]);
   return $users=$requete->fetchAll();

}
function countcirco(){
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->query('select count(libelle) sum from circonscription');
   // $requete->execute([
   //    'id'=>$a
   // ]);
   return $users=$requete->fetchAll();

}
function getresultPersonnel(string $nom){
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->prepare('select cand.numero numero,cand.nom_cand nom, r.nbre_voix voix, b.libelle_bureau bureau, c.libelle_centre centre from candidat cand inner join resultat r on cand.numero=r.num_cand inner join bureau b on r.id_bureau=b.id_bureau inner join centre c on b.id_centre=c.id_centre where cand.nom_cand LIKE "%" :id "%" ');
   $requete->execute([
      'id'=>$nom
   ]);
   return $users=$requete->fetchAll();

}
function getresultPersonnelCentre(string $nom, $centre){
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->prepare('select cand.numero numero,cand.nom_cand nom, sum(r.nbre_voix) voix, b.libelle_bureau bureau, c.libelle_centre centre from candidat cand inner join resultat r on cand.numero=r.num_cand inner join bureau b on r.id_bureau=b.id_bureau inner join centre c on b.id_centre=c.id_centre
   group by cand.nom_cand, c.libelle_centre having cand.nom_cand LIKE "%" :nom "%" and c.libelle_centre LIKE "%" :centre "%"');
   $requete->execute([
      'nom'=>$nom,
      'centre'=>$centre
   ]);
   return $users=$requete->fetchAll();

}
function getresultPersonnelCirconscription(string $nom, $centre){
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->prepare('select cand.numero numero,cand.nom_cand nom,  sum(r.nbre_voix) voix, b.libelle_bureau bureau, c.libelle_centre centre from candidat cand inner join resultat r on cand.numero=r.num_cand inner join bureau b on r.id_bureau=b.id_bureau inner join centre c on b.id_centre=c.id_centre
   inner join circonscription circ on c.id_circ=circ.id_circ
   group by cand.nom_cand, circ.libelle having cand.nom_cand REGEXP "^" :nom "$"  and circ.libelle REGEXP "^" :centre "$"');
   $requete->execute([
      'nom'=>$nom,
      'centre'=>$centre
   ]);
   return $users=$requete->fetchAll();
}
function getresultPersonnelCirconscriptionAll(string $nom){
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->prepare('select cand.numero numero,cand.nom_cand nom,circ.libelle circo, circ.province province, sum(r.nbre_voix) voix, b.libelle_bureau bureau, c.libelle_centre centre from candidat cand inner join resultat r on cand.numero=r.num_cand inner join bureau b on r.id_bureau=b.id_bureau inner join centre c on b.id_centre=c.id_centre
   inner join circonscription circ on c.id_circ=circ.id_circ
   group by cand.nom_cand, circ.libelle having cand.nom_cand LIKE "%" :nom "%" order by voix desc');
   $requete->execute([
      'nom'=>$nom,
      
   ]);
   return $users=$requete->fetchAll();
}
function getresultPersonnelProvince(string $nom, $centre){
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->prepare('select cand.numero numero,cand.nom_cand nom, sum(r.nbre_voix) voix, b.libelle_bureau bureau, c.libelle_centre centre from candidat cand inner join resultat r on cand.numero=r.num_cand inner join bureau b on r.id_bureau=b.id_bureau inner join centre c on b.id_centre=c.id_centre
   inner join circonscription circ on c.id_circ=circ.id_circ
   group by cand.nom_cand, circ.province having cand.nom_cand LIKE "%" :nom "%" and circ.province LIKE "%" :centre "%"');
   $requete->execute([
      'nom'=>$nom,
      'centre'=>$centre
   ]);
   return $users=$requete->fetchAll();
}
function getresultProvince(string $nom){
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->prepare('select cand.numero numero,cand.nom_cand nom, r.nbre_voix voix, b.libelle_bureau bureau, c.libelle_centre centre,circ.libelle circo, circ.province province from candidat cand inner join resultat r on cand.numero=r.num_cand inner join bureau b on r.id_bureau=b.id_bureau inner join centre c on b.id_centre=c.id_centre
   inner join circonscription circ on c.id_circ=circ.id_circ
   where circ.province REGEXP "^":nom"$"');
   $requete->execute([
      'nom'=>$nom,
     
   ]);
   return $users=$requete->fetchAll();
}
function getresultPersonnelProvinceAll(string $nom){
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->prepare('select cand.numero numero,cand.nom_cand nom, sum(r.nbre_voix) voix, b.libelle_bureau bureau, c.libelle_centre centre, circ.libelle circo, circ.province province from candidat cand 
   inner join resultat r on cand.numero=r.num_cand inner join bureau b on r.id_bureau=b.id_bureau 
   inner join centre c on b.id_centre=c.id_centre
   inner join circonscription circ on c.id_circ=circ.id_circ
   group by cand.nom_cand, circ.province having cand.nom_cand REGEXP "^" :nom "$" order by voix desc');
   $requete->execute([
      'nom'=>$nom,
      
   ]);
   return $users=$requete->fetchAll();
}
function getresultPersonnelBureau(string $nom, $centre){
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->prepare('select cand.numero numero,cand.nom_cand nom, sum(r.nbre_voix) voix, b.libelle_bureau bureau, c.libelle_centre centre from candidat cand inner join resultat r on cand.numero=r.num_cand inner join bureau b on r.id_bureau=b.id_bureau inner join centre c on b.id_centre=c.id_centre
   group by cand.nom_cand, b.libelle_bureau having cand.nom_cand REGEXP "^" :nom "$" and b.libelle_bureau REGEXP "^" :centre "$"');
   $requete->execute([
      'nom'=>$nom,
      'centre'=>$centre
   ]);
   return $users=$requete->fetchAll();
}


// ****************************************************************************
// CALCUL DES SOMMES

function getSumBureau(int $type){
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->prepare('select sum(res.nbre_voix) somme from resultat res inner join candidat cand on res.num_cand=cand.numero group by cand.id_cat having cand.id_cat=:id');
   $requete->execute([
      'id'=>$type
      
   ]);
   return $users=$requete->fetchAll();
}
function getSumCentre(string $centre, int $cat){
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->prepare('select sum(res.nbre_voix) somme from resultat res inner join candidat cand on res.num_cand=cand.numero inner join bureau b
    on res.id_bureau=b.id_bureau inner join centre ct on b.id_centre=ct.id_centre  
    group by ct.libelle_centre, cand.id_cat having ct.libelle_centre=:id and cand.id_cat=:cat');
   $requete->execute([
      'id'=>$centre,
      'cat'=>intval($cat)
      
   ]);
   return $users=$requete->fetchAll();
}
function getSumCirc(string $circ, int $cat){
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->prepare('select  sum(res.nbre_voix) somme from resultat res inner join candidat cand on res.num_cand=cand.numero inner join bureau b
   on res.id_bureau=b.id_bureau inner join centre ct on b.id_centre=ct.id_centre inner join circonscription circ on ct.id_circ=circ.id_circ
   group by circ.libelle, cand.id_cat having circ.libelle=:id and  cand.id_cat=:cat');
   $requete->execute([
      'id'=>$circ,
      'cat'=>intval($cat)
      
   ]);
   return $users=$requete->fetchAll();
}
function getRapportCentre(int $cat){
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->prepare('select ct.libelle_centre centre, sum(res.nbre_voix) somme from resultat res inner join candidat cand on res.num_cand=cand.numero inner join bureau b
    on res.id_bureau=b.id_bureau inner join centre ct on b.id_centre=ct.id_centre  
    group by ct.libelle_centre, cand.id_cat having  cand.id_cat=:cat');
   $requete->execute([
      'cat'=>intval($cat)
      
   ]);
   return $users=$requete->fetchAll();
}
function getRapportCirc(int $cat){
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->prepare('select circ.libelle circ, sum(res.nbre_voix) somme from resultat res inner join candidat cand on res.num_cand=cand.numero inner join bureau b on res.id_bureau=b.id_bureau
   inner join centre ct on b.id_centre=ct.id_centre inner join circonscription circ on ct.id_circ=circ.id_circ
    group by circ.libelle, cand.id_cat having  cand.id_cat=:cat');
   $requete->execute([
      'cat'=>intval($cat)
      
   ]);
   return $users=$requete->fetchAll();
}
// **************************************************
// le classsement
function getClassementpresidentiel(){
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->query('select cand.numero numero,cand.nom_cand nom, cand.postnom_cand post, sum(r.nbre_voix) voix
    from candidat cand inner join resultat r on cand.numero=r.num_cand 
    inner join bureau b on r.id_bureau=b.id_bureau 
    inner join centre c on b.id_centre=c.id_centre
   inner join circonscription circ on c.id_circ=circ.id_circ
   group by  cand.nom_cand,cand.postnom_cand,  cand.id_cat having cand.id_cat=0  order by voix desc
      
   ');
   // $requete->execute([
   //    'nom'=>$nom,
   //    'centre'=>$centre
   // ]);
   return $users=$requete->fetchAll();
}
function getClassementNationnal(string $circ){
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->prepare('select cand.numero numero,cand.nom_cand nom, cand.postnom_cand post, sum(r.nbre_voix) voix
    from candidat cand inner join resultat r on cand.numero=r.num_cand 
    inner join bureau b on r.id_bureau=b.id_bureau 
    inner join centre c on b.id_centre=c.id_centre
   inner join circonscription circ on c.id_circ=circ.id_circ
   group by circ.libelle, cand.nom_cand, cand.id_cat having circ.libelle=:id and cand.id_cat=1 order by voix desc
      
   ');
   $requete->execute([
      'id'=>$circ,
   ]);
   return $users=$requete->fetchAll();
}
function getClassementPresidentielCirc(string $circ){
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->prepare('select cand.numero numero,cand.nom_cand nom, cand.postnom_cand post, sum(r.nbre_voix) voix
    from candidat cand inner join resultat r on cand.numero=r.num_cand 
    inner join bureau b on r.id_bureau=b.id_bureau 
    inner join centre c on b.id_centre=c.id_centre
   inner join circonscription circ on c.id_circ=circ.id_circ
   group by circ.libelle, cand.nom_cand, cand.id_cat having circ.libelle=:id and cand.id_cat=0 order by voix desc
      
   ');
   $requete->execute([
      'id'=>$circ,
   ]);
   return $users=$requete->fetchAll();
}
function getClassementPresidentielCentre(string $circ){
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->prepare('select cand.numero numero,cand.nom_cand nom, cand.postnom_cand post, sum(r.nbre_voix) voix
    from candidat cand inner join resultat r on cand.numero=r.num_cand 
    inner join bureau b on r.id_bureau=b.id_bureau 
    inner join centre c on b.id_centre=c.id_centre
   inner join circonscription circ on c.id_circ=circ.id_circ
   group by c.libelle_centre, cand.nom_cand, cand.id_cat having c.libelle_centre=:id and cand.id_cat=0 order by voix desc
      
   ');
   $requete->execute([
      'id'=>$circ,
   ]);
   return $users=$requete->fetchAll();
}
function getClassementPresidentielBureau(string $circ){
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->prepare('select cand.numero numero,cand.nom_cand nom, cand.postnom_cand post, sum(r.nbre_voix) voix
    from candidat cand inner join resultat r on cand.numero=r.num_cand 
    inner join bureau b on r.id_bureau=b.id_bureau 
    inner join centre c on b.id_centre=c.id_centre
   inner join circonscription circ on c.id_circ=circ.id_circ
   group by b.libelle_bureau, cand.nom_cand, cand.id_cat having b.libelle_bureau=:id and cand.id_cat=0 order by voix desc
      
   ');
   $requete->execute([
      'id'=>$circ,
   ]);
   return $users=$requete->fetchAll();
}
function getClassementPresidentielProvince(string $circ){
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->prepare('select cand.numero numero,cand.nom_cand nom, cand.postnom_cand post, sum(r.nbre_voix) voix
    from candidat cand inner join resultat r on cand.numero=r.num_cand 
    inner join bureau b on r.id_bureau=b.id_bureau 
    inner join centre c on b.id_centre=c.id_centre
   inner join circonscription circ on c.id_circ=circ.id_circ
   group by circ.province, cand.nom_cand, cand.id_cat having circ.province=:id and cand.id_cat=0 order by voix desc
      
   ');
   $requete->execute([
      'id'=>$circ,
   ]);
   return $users=$requete->fetchAll();
}
function getvotantpresidents(){
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->query('select  sum(nbre_voix) voix from resultat inner join candidat on candidat.numero=resultat.num_cand where candidat.id_cat=0');
   return $users=$requete->fetchAll();
}
function getVotantPresidentProv(string $circ){
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->prepare('select cand.numero numero,cand.nom_cand nom, cand.postnom_cand post, sum(r.nbre_voix) voix
   from candidat cand inner join resultat r on cand.numero=r.num_cand 
   inner join bureau b on r.id_bureau=b.id_bureau 
   inner join centre c on b.id_centre=c.id_centre
  inner join circonscription circ on c.id_circ=circ.id_circ
  group by circ.province, cand.id_cat having circ.province=:id and cand.id_cat=0 order by voix desc
     
  ');
   $requete->execute([
      'id'=>$circ,
   ]);
   return $users=$requete->fetchAll();
}
function getVotantPresidentCentre(string $circ){
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->prepare('select cand.numero numero,cand.nom_cand nom, cand.postnom_cand post, sum(r.nbre_voix) voix
   from candidat cand inner join resultat r on cand.numero=r.num_cand 
   inner join bureau b on r.id_bureau=b.id_bureau 
   inner join centre c on b.id_centre=c.id_centre
  inner join circonscription circ on c.id_circ=circ.id_circ
  group by c.libelle_centre, cand.id_cat having c.libelle_centre=:id and cand.id_cat=0 order by voix desc
     
  ');
   $requete->execute([
      'id'=>$circ,
   ]);
   return $users=$requete->fetchAll();
}
function getVotantPresidentBureau(string $circ){
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->prepare('select cand.numero numero,cand.nom_cand nom, cand.postnom_cand post, sum(r.nbre_voix) voix
   from candidat cand inner join resultat r on cand.numero=r.num_cand 
   inner join bureau b on r.id_bureau=b.id_bureau 
   inner join centre c on b.id_centre=c.id_centre
  inner join circonscription circ on c.id_circ=circ.id_circ
  group by b.libelle_bureau, cand.id_cat having b.libelle_bureau=:id and cand.id_cat=0 order by voix desc
     
  ');
   $requete->execute([
      'id'=>$circ,
   ]);
   return $users=$requete->fetchAll();
}
function getVotantPresidentCirc(string $circ){
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->prepare('select cand.numero numero,cand.nom_cand nom, cand.postnom_cand post, sum(r.nbre_voix) voix
   from candidat cand inner join resultat r on cand.numero=r.num_cand 
   inner join bureau b on r.id_bureau=b.id_bureau 
   inner join centre c on b.id_centre=c.id_centre
  inner join circonscription circ on c.id_circ=circ.id_circ
  group by circ.libelle, cand.id_cat having circ.libelle=:id and cand.id_cat=0 order by voix desc
     
  ');
   $requete->execute([
      'id'=>$circ,
   ]);
   return $users=$requete->fetchAll();
}




function getClassementNatCirc(string $circ){
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->prepare('select cand.numero numero,cand.nom_cand nom, cand.postnom_cand post, sum(r.nbre_voix) voix
    from candidat cand inner join resultat r on cand.numero=r.num_cand 
    inner join bureau b on r.id_bureau=b.id_bureau 
    inner join centre c on b.id_centre=c.id_centre
   inner join circonscription circ on c.id_circ=circ.id_circ
   group by circ.libelle, cand.nom_cand, cand.id_cat having circ.libelle=:id and cand.id_cat=1 order by voix desc
      
   ');
   $requete->execute([
      'id'=>$circ,
   ]);
   return $users=$requete->fetchAll();
}
function getClassementNatCentre(string $circ){
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->prepare('select cand.numero numero,cand.nom_cand nom, cand.postnom_cand post, sum(r.nbre_voix) voix
    from candidat cand inner join resultat r on cand.numero=r.num_cand 
    inner join bureau b on r.id_bureau=b.id_bureau 
    inner join centre c on b.id_centre=c.id_centre
   inner join circonscription circ on c.id_circ=circ.id_circ
   group by c.libelle_centre, cand.nom_cand, cand.id_cat having c.libelle_centre=:id and cand.id_cat=1 order by voix desc
      
   ');
   $requete->execute([
      'id'=>$circ,
   ]);
   return $users=$requete->fetchAll();
}
function getClassementNatBureau(string $circ){
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->prepare('select cand.numero numero,cand.nom_cand nom, cand.postnom_cand post, sum(r.nbre_voix) voix
    from candidat cand inner join resultat r on cand.numero=r.num_cand 
    inner join bureau b on r.id_bureau=b.id_bureau 
    inner join centre c on b.id_centre=c.id_centre
   inner join circonscription circ on c.id_circ=circ.id_circ
   group by b.libelle_bureau, cand.nom_cand, cand.id_cat having b.libelle_bureau=:id and cand.id_cat=1 order by voix desc
      
   ');
   $requete->execute([
      'id'=>$circ,
   ]);
   return $users=$requete->fetchAll();
}
function getClassementNatProvince(string $circ){
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->prepare('select cand.numero numero,cand.nom_cand nom, cand.postnom_cand post, sum(r.nbre_voix) voix
    from candidat cand inner join resultat r on cand.numero=r.num_cand 
    inner join bureau b on r.id_bureau=b.id_bureau 
    inner join centre c on b.id_centre=c.id_centre
   inner join circonscription circ on c.id_circ=circ.id_circ
   group by circ.province, cand.nom_cand, cand.id_cat having circ.province=:id and cand.id_cat=1 order by voix desc
      
   ');
   $requete->execute([
      'id'=>$circ,
   ]);
   return $users=$requete->fetchAll();
}





function getVotantNatCentre(string $circ){
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->prepare('select cand.numero numero,cand.nom_cand nom, cand.postnom_cand post, sum(r.nbre_voix) voix
   from candidat cand inner join resultat r on cand.numero=r.num_cand 
   inner join bureau b on r.id_bureau=b.id_bureau 
   inner join centre c on b.id_centre=c.id_centre
  inner join circonscription circ on c.id_circ=circ.id_circ
  group by c.libelle_centre, cand.id_cat having c.libelle_centre=:id and cand.id_cat=1 order by voix desc
     
  ');
   $requete->execute([
      'id'=>$circ,
   ]);
   return $users=$requete->fetchAll();
}
function getVotantNatBureau(string $circ){
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->prepare('select cand.numero numero,cand.nom_cand nom, cand.postnom_cand post, sum(r.nbre_voix) voix
   from candidat cand inner join resultat r on cand.numero=r.num_cand 
   inner join bureau b on r.id_bureau=b.id_bureau 
   inner join centre c on b.id_centre=c.id_centre
  inner join circonscription circ on c.id_circ=circ.id_circ
  group by b.libelle_bureau, cand.id_cat having b.libelle_bureau=:id and cand.id_cat=1 order by voix desc
     
  ');
   $requete->execute([
      'id'=>$circ,
   ]);
   return $users=$requete->fetchAll();
}
function getVotantNatCirc(string $circ){
   $connect=new Connexion();
   $connexion=$connect->open();
   $requete=$connexion->prepare('select cand.numero numero,cand.nom_cand nom, cand.postnom_cand post, sum(r.nbre_voix) voix
   from candidat cand inner join resultat r on cand.numero=r.num_cand 
   inner join bureau b on r.id_bureau=b.id_bureau 
   inner join centre c on b.id_centre=c.id_centre
  inner join circonscription circ on c.id_circ=circ.id_circ
  group by circ.libelle, cand.id_cat having circ.libelle=:id and cand.id_cat=1 order by voix desc
     
  ');
   $requete->execute([
      'id'=>$circ,
   ]);
   return $users=$requete->fetchAll();
}