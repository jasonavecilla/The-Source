<?php

include ("../../includes/db-connect.php");

if($dbConn == true) {
    $nId = $_POST['id'];  

    try {
        $qUpdate = "UPDATE `u955154186_db_llanes`.`tbl_products` 
            SET `deletedate` = '".date("Y-m-d H:i:s")."'
            WHERE `id` = '{$nId}'
        ";        

        $eUpdate = mysqli_query($dbConn, $qUpdate);

        if ($eUpdate == true) {
            echo "product removed!";
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