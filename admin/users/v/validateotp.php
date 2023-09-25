<?php

include("../../../includes/db-connect.php");

if ($dbConn == true) {
    $nId = $_POST['id'];
    $sOtp = $_POST['otp'];

    try {    
        $qQuery = "SELECT * FROM `u955154186_db_llanes`.`tbl_users` WHERE `id` = '$nId'";

        $eQuery = mysqli_query($dbConn, $qQuery);

        $rows = mysqli_fetch_assoc($eQuery);
        
        if ($eQuery) {
            if($rows['otp'] == $sOtp) {
                echo "match";
            } else {
                echo "does not match";
            }
            
        } else {
            echo "error";
        }

    } catch(Exception $e) {
        echo "error";
    }

} else {
    echo 'failed to connect!';
}