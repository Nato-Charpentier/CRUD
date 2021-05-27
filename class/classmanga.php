<?php
include __DIR__ . '/../connexion/connexiondb.php';


class manga {

    /**
     * create a manga
     *
     * param [string] $titre
     * param [string] $langue
     * param [int] $age_limite
     * param [date] $date
     * param [string] $resume
     * param [int] $genre
     * return void
     */
    public function createManga($titre,$langue,$age_limite,$date,$resume,$genre){
        global $conn;
        $request_insert = "INSERT INTO `manga` (`titre`,`langue`,`age_limite`,`date`,`resumer`,`fk_id_genre`) VALUES ('" . $titre . "','" . $langue . "','" . $age_limite . "','".$date."','" . $resume . "','" . $genre . "')";
        $res = $conn->query($request_insert);
        
        return $res;
    }

    /**
     * join in manga: fk_id_genre has in genre: id_genre
     *
     * return $get_all_manga
     */
    public function getAllManga(){
        global $conn;

        // je récupère liste manga
        $request_all = "SELECT * FROM `manga` as m left join genre as g on m.fk_id_genre = g.id_genre ORDER BY m.date DESC";
        $get_all_manga = $conn->query($request_all);

        return $get_all_manga;
    }

    /**
     * connect to the genre and display the libelle
     *
     * return void
     */
    public function getAllGenre(){
        global $conn;
        // je récupère liste genre
        $get_request = "SELECT * FROM `genre`";
        $get_all_genre = $conn->query($get_request);

        return $get_all_genre;
    }

    /**
     * delete 1 manga selected
     *
     * param [int] $id_manga
     * return void
     */
    public function deleteManga($id_manga){
        global $conn;

        $delete_manga_request = "DELETE FROM `manga` WHERE id=".$id_manga;
        $res = $conn->query($delete_manga_request);

        return $res;
    }

    /**
     * update the manga select
     *
     * param [int] $id_manga
     * param [string] $titre
     * param [string] $langue
     * param [int] $age_limite
     * param [date] $date
     * param [string] $resume
     * param [int] $genre
     * return void
     */
    public function updateManga($id_manga,$titre,$langue,$age_limite,$date,$resume,$genre){
        global $conn;
        $update = "UPDATE `manga` SET `titre`='".$titre."',`langue`='".$langue."',`age_limite`='".$age_limite."',`date`='".$date."' ,`resumer`='".$resume."',`fk_id_genre`='".$genre."' WHERE id =".$id_manga;
        $res = $conn->query($update);
        
        return $res;
    }
}
