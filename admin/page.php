<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    $manga = new manga();
    
    // je gères tous mes boutton
    if (!empty($_POST['button'])) {

            if ($_POST['button'] == "creer") {
                $titre = $_POST['titre']; 
                $langue = $_POST['langue'];
                $age_limite = $_POST['age_limite'];
                $date = $_POST['date'];
                $resume = $_POST['resume'];
                $genre = $_POST['genre'];

                $manga->createManga($titre,$langue,$age_limite,$date,$resume,$genre);

            }

            if($_POST['button'] == "supprimer"){
        
                $id_manga = $_POST['id_manga'];
                $manga->deleteManga($id_manga);
            
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

                $manga->updateManga($id_manga,$titre,$langue,$age_limite,$date,$resume,$genre);

            }

    }

    $get_all_manga = $manga->getAllManga();
    $get_all_genre = $manga->getAllGenre();


    // affichage
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
        echo'</form>';
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

</body>

</html>