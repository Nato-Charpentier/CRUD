<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./public_html/css/bootstrap.css" rel="stylesheet" crossorigin="anonymous">
</head>

<body>
    <?php
    include('connexion/connexiondb.php');
    include('class/classmanga.php');

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

                $obj_manga->createManga($titre,$langue,$age_limite,$date,$resume,$genre);

            }

            if($_POST['button'] == "supprimer"){
        
                $id_manga = $_POST['id_manga'];
                $obj_manga->deleteManga($id_manga);
            
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

                $obj_manga->updateManga($id_manga,$titre,$langue,$age_limite,$date,$resume,$genre);

            }

    }

    $get_all_manga = $obj_manga->getAllManga();
    $get_all_genre = $obj_manga->getAllGenre();


    // affichage
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
                echo'</tr>';
            
        }
        echo'</tbody>';
    echo'</table>';
?>

</body>

</html>