<?php

include ("../../includes/db-connect.php");

if($dbConn == true) {
    $nId = $_POST['id'];
    $sStatus = $_POST['status']; 

    try {

        $qUpdate = "UPDATE `u955154186_db_llanes`.`tbl_users` 
                    SET `status` = '{$sStatus}'
                    WHERE `id` = '{$nId}'
                "; 
        $eUpdate = mysqli_query($dbConn, $qUpdate);


        $qQuery = "SELECT `status` FROM `u955154186_db_llanes`.`tbl_users` WHERE `id` = '".$nId."'";
        $eQuery = mysqli_query($dbConn, $qQuery);

            $rows = mysqli_fetch_assoc($eQuery);
            echo $rows['status'];      

    } catch(Exception $e) {
        echo "error";
    }

} else {
    echo 'failed to connect!';
}