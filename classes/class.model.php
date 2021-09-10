<?php
include __DIR__ . '/../connexion/connexiondb.php';


class Model{

    /**
     * create a manga
     *
     * param [string] $titre
     * param [date] $date
     * param [string] $resume
     * return void
     */
    public function createWorks($titre,$date,$resume,$lien){
        global $conn;
        $request_insert = "INSERT INTO `works` (`titre`, `date`, `resumer`, `liens`) VALUES ('" . $titre . "', '" . $date . "', '" . $resume . "',  '" . $lien . "')";
        $res = $conn->query($request_insert);
        
        return $res;
    }

   
    public function getAllWorks(){
        global $conn;

        $request_all = "SELECT * FROM `works`";
        $get_all_works = $conn->query($request_all);

        return $get_all_works;
    }

 
    /**
     * delete 1 works selected
     *
     * param [int] $id_works
     * return void
     */
    public function deleteWorks($id_works){
        global $conn;

        $delete_works_request = "DELETE FROM `works` WHERE id = ".$id_works;
        $res = $conn->query($delete_works_request);

        return $res;
    }

    /**
     * update the manga select
     *
     * param [int] $id_works
     * param [string] $titre
     * param [date] $date
     * param [string] $resume
     * return void
     */
    public function updateWorks($id_works,$titre,$date,$resume,$lien){
        global $conn;
        $update = "UPDATE `works` SET `titre`='".$titre."',`date`='".$date."' ,`resumer`='".$resume."' ,`liens`='".$lien."' WHERE id =".$id_works;
        $res = $conn->query($update);
        
        return $res;
    }
}
