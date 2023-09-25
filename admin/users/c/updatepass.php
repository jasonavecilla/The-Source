<?php

include ("../../../includes/db-connect.php");

if($dbConn == true) {
    $nId = $_POST['id'];
    $sNewPass =  addslashes($_POST['newpass']);

    try {
        $qUpdate = "UPDATE `u955154186_db_llanes`.`tbl_users` 
            SET `password`= '".$sNewPass."'
            WHERE `id` = '{$nId}'
        "; 

        $eUpdate = mysqli_query($dbConn, $qUpdate);

        if ($eUpdate == true) {
            echo "New Pass Saved";
            mysqli_close($dbConn);
        } else {
            echo "Failed to process, please call system administrator!";
            mysqli_close($dbConn);
        }

    } catch(Exception $e) {
        echo "error";
    }

} else {
    echo 'failed to connect!';
}