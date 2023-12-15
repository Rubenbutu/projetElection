<?php
class Connexion{
     public  $serveur;
     public  $login;
     public $password;
     public $connexion;
     function __construct()
     {
        $this->serveur=='localhost';
        $this->login='root';
        $this->password='';
        $this->connexion=null;
         }

   public function open()
    {
    try{
        $connexion=new PDO("mysql:host=$this->serveur; dbname=elections", $this->login,$this->password);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connexion;
        }catch(PDOException $e){
            die('il ya eu erreur de connexion à la base de données'."<br><br>".$e);
        }
   
   

    }
}



?>