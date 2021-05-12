<?php
session_start();
    if(isset($_POST['valider'])){
        if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){
            $pseudo_par_defaut = "admin";
            $mdp_par_defaut = "admin1234";

            $pseudo_saisi = htmlspecialchars($_POST['pseudo']);
            $mdp_saisi = htmlspecialchars($_POST['mdp']);

            if($pseudo_saisi == $pseudo_par_defaut AND $mdp_saisi == $mdp_par_defaut){
                $_SESSION['mdp'] = $mdp_saisi;
                header('Location: ./admin/page.php');
            }else{
                echo"Votre mot de passe ou pseudo est incorrecte";
            }
        }else{
            echo"Veuillez compléter tous les champs";
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Espace de connexion admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../public_html/css/bootstrap.css">
    </head>
    <body>
        <form method="post" align="center">
            <h1>
                Admin Manga
            </h1>
            <input type="text" name="pseudo">
            <br>
            <input type="password" name="mdp">
            <br><br>
            <input type="submit" name="valider">
        </form>
    </body>
</html>