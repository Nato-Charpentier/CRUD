<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Admin</title>
    <link href="../publichtml/css/page.css" rel="stylesheet">
</head>

<body>
<?php
    session_start();
    if(!$_SESSION['mdp']){
        header('Location: admin.php');
    }

    include __DIR__ . '/../classes/class.controller.php';

    // affichage
    //pop-pup
    if (isset($sucess)){
        echo '<div id="sucess" style="background-color:green;" class="sucess">sa a bien reussie</div>';
    }
    if (isset($error)){
        echo '<div id="error" style="background-color:red;" class="error">echec</div>';
    }
    
    if (isset($suc)){
        echo '<div id="suc" style="background-color:green;" class="suc">sa a bien supprimer</div>';
    }
    if (isset($err)){
        echo '<div id="err" style="background-color:red;" class="err">echec</div>';
    }
    
    if (isset($sucees)){
        echo '<div id="sucees" style="background-color:green;" class="sucees">sa a bien etait modifier</div>';
    }
    if (isset($eroor)){
        echo '<div id="eroor" style="background-color:red;" class="eroor">echec</div>';
    }

    //navbar
    echo'<div id="nav">';
            echo"<a class='nav-link active' aria-current='page' href='../index.php' style='color:#FF0000;'>Page d'accueille</a>";
    echo'</div>';

    //form input
    echo'<form action="views.php" method="post" align="center">';

        echo'<div class="form__group field">';
            echo'<input type="input" class="form__field" name="titre" placeholder="titre"/>';
            echo'<label for="name" class="form__label">Titre</label>';
        echo'</div>';
        
        echo'<div class="form__group field">';
            echo'<input type="date" class="form__field" name="date"/>';
        echo'</div>';

        echo'<div class="form__group field">';
            echo'<input type="input" class="form__field" name="resume" placeholder="résumer"/>';
            echo'<label for="name" class="form__label">Résumer</label>';
        echo'</div>';

        echo'<div class="form__group field">';
            echo'<input type="input" class="form__field" name="lien" placeholder="liens"/>';
            echo'<label for="name" class="form__label">Liens</label>';
        echo'</div>';
        // echo'<input type="text" name="titre" placeholder="titre">';
        // echo'<input type="date" name="date">';
        // echo'<input type="text" name="resume" placeholder="résumer">';
        // echo'<input type="text" name="lien" placeholder="liens">';

        echo'<button class="custom-btn btn-1" type="submit" name="button" value="creer">';
            echo'enregistré';
        echo'</button>';

    echo'</form>';


    echo'<br>';

    echo'<table class="tableau-style">';
        echo'<thead  align="center">';
            echo'<tr>';
                echo'<th >';
                    echo'Titre';
                echo'</th>';
                echo'<th >';
                    echo'Date';
                echo'</th>';
                echo'<th >';
                    echo'Résumer';
                echo'</th>';
                echo'<th >';
                    echo'Liens';
                echo'</th>';
                echo'<th >';
                    echo'Action';
                echo'</th>';
            echo'</tr>';
        echo'</thead>';

        echo'<tbody>';
        
        foreach($get_all_works as $value){
            
            if((isset($etat)) && ($value['id'] == $id_clique )){

                echo'<form action="views.php" method="post" align="center">';
                echo'<input type="hidden" name="id_works" value="'.$value['id'].'">';

                    echo'<tr>';
                    echo'<div class="form__group field">';
                        echo'<td data-label="titre">';
                            echo'<input class="form__field" type="text" name="titre" value="'.$value['titre'].'" placeholder="titre">';
                            echo'<label for="name" class="form__label">Titre</label>';
                        echo'</td>';
                    echo'</div>';

                    echo'<div class="form__group field">';
                        echo'<td data-label="date">';
                            echo'<input class="form__field" type="date" name="date"  value="'.$value['date'].'">';
                        echo'</td>';
                        echo'</div>';

                        echo'<div class="form__group field">';
                        echo'<td data-label="resumer">';
                            echo'<input class="form__field" type="text" name="resume"  value="'.$value['resumer'].'" placeholder="résumer">';
                            echo'<label for="name" class="form__label">Résumer</label>';
                        echo'</td>';
                        echo'</div>';

                        echo'<div class="form__group field">';
                        echo'<td data-label="liens">';
                            echo'<input class="form__field" type="text" name="lien"  value="'.$value['liens'].'" placeholder="liens">';
                            echo'<label for="name" class="form__label">Liens</label>';
                        echo'</td>';
                        echo'</div>';

                        echo'<td>';
                            echo'<button type="submit" class="custom-btn btn-1" name="button" value="modifier">';
                                echo'enregistré';
                            echo'</button>';
                        echo'</td>';
                    echo'</tr>';
                echo'</form>';

            }else{

                echo'<tr align="center">';
                    echo'<td data-label="titre">';
                        echo$value['titre'];
                    echo'</td>';
                    echo'<td data-label="date">';
                        echo$value['date'];
                    echo'</td>';
                    echo'<td data-label="resumer">';
                        echo$value['resumer'];
                    echo'</td>';
                    echo'<td data-label="liens">';
                        echo "<a href='" . $value['liens'] . "'>" . $value['liens'] . "</a>";
                    echo'</td>';
        
                    echo'<td>';
                        
                        // button - ouvrire modifier
                        echo'<form action="views.php" method="post" align="center">';
                        
                            echo'<input type="hidden" name="id_works" value="'.$value['id'].'">';                    

                            echo'<button class="custom-btn btn-1" name="button" value="open_modifier" type="submit">';
                                echo'modifier';
                            echo'</button>';
                        
                        echo'</form>';

                        // button - supprimer la ligne séléctionner
                        echo' <form action="views.php" method="post" align="center">';

                            echo'<input type="hidden" name="id_works" value="'.$value['id'].'">';

                            echo' <button class="custom-btn btn-1" name="button" value="supprimer" type="submit">';
                                echo'supprimer';
                            echo'</button>';
                        echo' </form>';
                    
                    echo'</td>';
                echo'</tr>';
            }
        }
        echo'</tbody>';
    echo'</table>';
?>

<script src="../publichtml/js/jquery.js"></script>

<script  language="javascript">

        $(document).ready(function(){
            
            $('.sucess').delay(2000).hide('fast');
            $('.error').delay(2000).hide('fast');
            $('.suc').delay(2000).hide('fast');
            $('.err').delay(2000).hide('fast');
            $('.sucees').delay(2000).hide('fast');
            $('.eroor').delay(2000).hide('fast');

        })

</script>

</body>

</html>