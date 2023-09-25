<?php

include ("../includes/db-connect.php");

if($dbConn == true) {
    $nId = $_POST['id'];    
    $sOtp = $_POST['sotp'];

    try {
        $qQuery = "SELECT * FROM `u955154186_db_llanes`.`tbl_users` WHERE `id` = '$nId'";
        $eQuery = mysqli_query($dbConn, $qQuery);

        $rows = mysqli_fetch_array($eQuery);

        if( $rows['otp'] == $sOtp ) {
            $qUpdate = "UPDATE `u955154186_db_llanes`.`tbl_users`
                        SET  `status` = 'active'
                        WHERE `id` = '$nId'
                    ";
            $eUpdate = mysqli_query($dbConn, $qUpdate);            
            echo "admin";
            mysqli_close($dbConn);
        } else {
            echo "You provided a wrong otp, please try again";
            mysqli_close($dbConn);
        }

    } catch(Exception $e) {
        echo "error";
    }

} else {
    echo 'failed to connect!';
}