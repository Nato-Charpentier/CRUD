<?php
session_start();
    if(isset($_POST['valider'])){
        if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){
            $pseudo_par_defaut = "admin";
            $mdp_par_defaut = "adminpassword";

            $pseudo_saisi = htmlspecialchars($_POST['pseudo']);
            $mdp_saisi = htmlspecialchars($_POST['mdp']);

            if($pseudo_saisi == $pseudo_par_defaut AND $mdp_saisi == $mdp_par_defaut){
                $_SESSION['mdp'] = $mdp_saisi;
                header('Location: ./views.php');
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
        <link rel="stylesheet" href="../publichtml/css/login.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/regular.min.js"/>
    </head>
<body class="light-theme">
<header>
    <div class="theme-switch-wrapper">
        <center>
            <label class="theme-switch" for="checkbox">
                <input type="checkbox" id="checkbox" />
                <div class="slider">
                    <svgOfSun />
                    <svgOfMoon />
                </div>
            </label>
        </center>
    </div>
            <div class="container">
                <div class="wrapper">
                    <div class="title"><span>Login Admin</span></div>
                    <form method="post">
                    <div class="row">
                        <i class="fas fa-user"></i>
                        <input type="text" name="pseudo" placeholder="pseudo">
                    </div>
                    <div class="row">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="mdp" placeholder="mot de passe">
                    </div>
                    <div class="row button">
                        <input type="submit" name="valider" value="Login">
                    </div>
                    </form>
                </div>
            </div>
            </header>
        <script>
            const themeToggle = document.querySelector(
            '.theme-switch input[type="checkbox"]'
            );
            function switchTheme(e) {
            if (e.target.checked) {
                document.documentElement.setAttribute("data-theme", "dark");
            } else {
                document.documentElement.setAttribute("data-theme", "light");
            }
            }
            themeToggle.addEventListener("change", switchTheme, false);

            function switchTheme(e) {
            if (e.target.checked) {
                document.documentElement.setAttribute("data-theme", "dark");

                localStorage.setItem("theme", "dark");
            } else {
                document.documentElement.setAttribute("data-theme", "light");

                localStorage.setItem("theme", "light");
            }
            }
            const currentTheme = localStorage.getItem("theme");
            if (currentTheme) {
            document.documentElement.setAttribute("data-theme", currentTheme);
            if (currentTheme === "dark") {
                themeToggle.checked = true;
            }
            }
        </script>
</body>
</html>