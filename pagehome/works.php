<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link href="public_html/css/bootstrap.css" rel="stylesheet" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="publichtml/css/works.css">
</head>

<body>
    <?php
    
    include __DIR__ . '/../classes/class.controller.php';

    // affichage
    echo'<table class="tableau-style">';
        echo'<thead  align="center">';
            echo'<tr>';
                echo'<th>';
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
            echo'</tr>';
        echo'</thead>';
        
        echo'<tbody>';
        foreach($get_all_works as $k => $value){
            
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
                echo'</tr>';
        }
        echo'</tbody>';
    echo'</table>';
?>

</body>

</html>