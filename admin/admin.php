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
          // Get the theme toggle input
            const themeToggle = document.querySelector(
            '.theme-switch input[type="checkbox"]'
            );
            // Function that will switch the theme based on the if the theme toggle is checked or not
            function switchTheme(e) {
            if (e.target.checked) {
                document.documentElement.setAttribute("data-theme", "dark");
            } else {
                document.documentElement.setAttribute("data-theme", "light");
            }
            }
            // Add an event listener to the theme toggle, which will switch the theme
            themeToggle.addEventListener("change", switchTheme, false);

            function switchTheme(e) {
            if (e.target.checked) {
                document.documentElement.setAttribute("data-theme", "dark");

                // Set the user's theme preference to dark
                localStorage.setItem("theme", "dark");
            } else {
                document.documentElement.setAttribute("data-theme", "light");

                // Set the user's theme preference to light
                localStorage.setItem("theme", "light");
            }
            }
            // Get the current theme from local storage
            const currentTheme = localStorage.getItem("theme");
            // If the current local storage item can be found
            if (currentTheme) {
            // Set the body data-theme attribute to match the local storage item
            document.documentElement.setAttribute("data-theme", currentTheme);
            // If the current theme is dark, check the theme toggle
            if (currentTheme === "dark") {
                themeToggle.checked = true;
            }
            }
        </script>
</body>
</html>