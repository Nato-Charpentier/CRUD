<?php 

include __DIR__ . '/../connexion/connexiondb.php';
include __DIR__ . '/../classes/class.model.php';

// instancier ma class works
    $obj_works = new Model();
    
    // je gères tous mes boutton
    if (!empty($_POST['button'])) {

            if ($_POST['button'] == "creer") {  
                $titre = $_POST['titre']; 
                $date = $_POST['date'];
                $resume = $_POST['resume'];
                $lien = $_POST['lien'];

                $res = $obj_works->createWorks($titre,$date,$resume,$lien);
                
                if ($res == true){
                    $sucess = 'sucess';
                }else{
                    $error = 'error';
                }
            }

            if($_POST['button'] == "supprimer"){
        
                $id_works = $_POST['id_works'];
                $res = $obj_works->deleteWorks($id_works);
            
                if ($res == true){
                    $suc = 'sucess';
                }else{
                    $err = 'error';
                }
            }
            
            // controler $etat avant modification
            if ($_POST['button'] == "open_modifier") {
                $etat = "ouvrir";
                $id_clique = $_POST['id_works'];
                
            }else{
                $etat = "";
                $id_clique = "";
            }

            // modification
            if ($_POST['button'] == "modifier"){

                $id_works= $_POST['id_works'];
                $titre = $_POST['titre'];
                $date = $_POST['date'];
                $resume = $_POST['resume'];
                $lien = $_POST['lien'];

                $res = $obj_works->updateWorks($id_works,$titre,$date,$resume,$lien);

                if ($res == true){
                    $sucees = 'sucess';
                }else{
                    $eroor = 'error';
                }
            }

    }

    $get_all_works = $obj_works->getAllWorks();

