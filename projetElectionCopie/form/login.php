<?php session_start(); 
unset($_SESSION['utilisateur'])?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="css/css/bootstrap.min.css">

    <link rel="stylesheet" href="css/all.min.css">

    <title>Document</title>
</head>

<body >
    <div class="center">
        <div class="block" style="display: flex;   justify-content: center;
    align-items: center;">
            <p style="font-size: 1.4rem; color:white;" ><?php
            if(isset($_SESSION['erreur'])){
                echo $_SESSION['erreur'];
            }else{ echo"";}
                session_destroy();?></p>
        </div>
        <div class="image ">
            <img src="../assets/img/log.png " alt=" ">
        </div>
        <!-- <h1>login</h1> -->
        <form action="../authentification.php" method="POST">
            <div class="txt_field ">
                <input type="text " name="nom_user" id=" " required>
                <span></span>
                <label for="">pseudo</label>
            </div>
            <div class="txt_field ">
                <input type="password" name="password" id=" " required>
                <span></span>
                <label for=" ">mot de passe</label>
            </div>
            <div class="pass ">Mot de pass oublié?</div>
            <button type="submit">se connecter</button>
            <div class="signup_link ">pas un membre? <a href=" ">créer compte</a></div>
        </form>
    </div>

    <script src="js/jquery-3.6.0.js"></script>
    <script src="js/all.min.js"></script>
    <script src="js/js/bootstrap.min.js"></script>
</body>


</html>