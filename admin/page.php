<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Admin</title>
    <link href="../public_html/css/bootstrap.css" rel="stylesheet" crossorigin="anonymous">
</head>

<body>
    <?php
    session_start();
    if(!$_SESSION['mdp']){
        header('Location: admin.php');
    }

    include __DIR__ . '/../connexion/connexiondb.php';
    include __DIR__ . '/../class/classmanga.php';

    // instancier ma class manga
    $obj_manga = new manga();
    
    // je gères tous mes boutton
    if (!empty($_POST['button'])) {

            if ($_POST['button'] == "creer") {
                $titre = $_POST['titre']; 
                $langue = $_POST['langue'];
                $age_limite = $_POST['age_limite'];
                $date = $_POST['date'];
                $resume = $_POST['resume'];
                $genre = $_POST['genre'];

                $res = $obj_manga->createManga($titre,$langue,$age_limite,$date,$resume,$genre);
                
                if ($res == true){
                    $sucess = 'sucess';
                }else{
                    $error = 'error';
                }
            }

            if($_POST['button'] == "supprimer"){
        
                $id_manga = $_POST['id_manga'];
                $res = $obj_manga->deleteManga($id_manga);
            
                if ($res == true){
                    $suc = 'sucess';
                }else{
                    $err = 'error';
                }
            }
            
            // controler $etat avant modification
            if ($_POST['button'] == "open_modifier") {
                $etat = "ouvrir";
                $id_clique = $_POST['id_manga'];
                $id_genre_clique = $_POST['id_genre'];
                
            }else{
                $etat = "";
                $id_clique = "";
            }

            // modification
            if ($_POST['button'] == "modifier"){

                $id_manga = $_POST['id_manga'];
                $titre = $_POST['titre'];
                $langue = $_POST['langue'];
                $age_limite = $_POST['age_limite'];
                $date = $_POST['date'];
                $resume = $_POST['resume'];
                $genre = $_POST['genre'];

                $res = $obj_manga->updateManga($id_manga,$titre,$langue,$age_limite,$date,$resume,$genre);

                if ($res == true){
                    $sucees = 'sucess';
                }else{
                    $eroor = 'error';
                }
            }

    }

    $get_all_manga = $obj_manga->getAllManga();
    $get_all_genre = $obj_manga->getAllGenre();


    // affichage
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
    
    
    echo'<form action="page.php" method="post" align="center">';

        echo'<input type="text" name="titre" placeholder="titre">';
        echo'<input type="text" name="langue" placeholder="langue">';
        echo'<input type="text" name="age_limite" placeholder="age limite">';
        echo'<input type="date" name="date">';
        echo'<input type="text" name="resume" placeholder="résumer">';
        echo'<select name="genre">';

        foreach ($get_all_genre as $k => $v) {
            echo'<option value="' . $v['id_genre'] . '">';
            echo$v['libelle'];
            echo'</option>';
        }
        echo'</select>';

        echo'<button type="submit" name="button" value="creer">';
        echo'enregistré';
        echo'</button>';

    echo'</form>';


    echo'<br>';

    echo'<table class="table">';
        echo'<thead  align="center">';
            echo'<tr>';
                echo'<th >';
                    echo'Titre';
                echo'</th>';
                echo'<th >';
                    echo'Langue';
                echo'</th>';
                echo'<th >';
                    echo'Age limite';
                echo'</th>';
                echo'<th >';
                    echo'Date';
                echo'</th>';
                echo'<th >';
                    echo'Résumer';
                echo'</th>';
                echo'<th >';
                    echo'Genre';
                echo'</th>';
            echo'</tr>';
        echo'</thead>';
        echo'<tbody>';
        foreach($get_all_manga as $k => $value){
            
            if((isset($etat)) && ($value['id'] == $id_clique )){

                echo'<form action="page.php" method="post" align="center">';
                echo'<input type="hidden" name="id_manga" value="'.$value['id'].'">';

                    echo'<tr>';
                        echo'<td>';
                            echo'<input type="text" name="titre" value="'.$value['titre'].'" placeholder="titre">';
                        echo'</td>';
                        echo'<td>';
                            echo'<input type="text" name="langue"  value="'.$value['langue'].'" placeholder="langue">';
                        echo'</td>';
                        echo'<td>';
                            echo'<input type="text" name="age_limite"  value="'.$value['age_limite'].'" placeholder="age limite">';
                        echo'</td>';
                        echo'<td>';
                            echo'<input type="date" name="date"  value="'.$value['date'].'">';
                        echo'</td>';
                        echo'<td>';
                            echo'<input type="text" name="resume"  value="'.$value['resumer'].'" placeholder="résumer">';
                        echo'</td>';
                        echo'<td>';
                            echo'<select name="genre">';
                            
                            foreach ($get_all_genre as $k => $v) {
                                if($v['id_genre'] == $id_genre_clique){
                                    echo'<option value="' . $v['id_genre'] . '" selected>';
                                        echo$v['libelle'];
                                    echo'</option>';
                                }else{
                                    echo'<option value="' . $v['id_genre'] . '">';
                                        echo$v['libelle'];
                                    echo'</option>';
                                }
                            }
                            
                            echo'</select>';
                        echo'</td>';
                        echo'<td>';
                            echo'<button type="submit" class="btn btn-warning" name="button" value="modifier">';
                                echo'enregistré';
                            echo'</button>';
                        echo'</td>';
                    echo'</tr>';
                echo'</form>';

            }else{

                echo'<tr align="center">';
                    echo'<td>';
                        echo$value['titre'];
                    echo'</td>';
                    echo'<td>';
                        echo$value['langue'];
                    echo'</td>';
                    echo'<td>';
                        echo$value['age_limite'];
                    echo'</td>';
                    echo'<td>';
                        echo$value['date'];
                    echo'</td>';
                    echo'<td>';
                        echo$value['resumer'];
                    echo'</td>';
                    echo'<td>';
                        echo$value['libelle'];
                    echo'</td>';
                    echo'<td>';
                        
                        // button - ouvrire modifier
                        echo'<form action="page.php" method="post" align="center">';
                        
                            echo'<input type="hidden" name="id_manga" value="'.$value['id'].'">';                    
                            echo'<input type="hidden" name="id_genre" value="'.$value['id_genre'].'">';                    

                            echo'<button class="btn btn-info" name="button" value="open_modifier" type="submit">';
                                echo'modifier';
                            echo'</button>';
                        
                        echo'</form>';

                        // button - supprimer la ligne séléctionner
                        echo' <form action="page.php" method="post" align="center">';
                            echo'<input type="hidden" name="id_manga" value="'.$value['id'].'">';
                            echo'<input type="hidden" name="id_genre" value="'.$value['id_genre'].'">';
                            echo' <button class="btn btn-danger" name="button" value="supprimer" type="submit">';
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

<script src="../jquery.js"></script>

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