<?php

include ("../../../includes/db-connect.php");
session_start();

if($dbConn == true) {
    $nId = $_POST['id'];
    $sPhoto = $_POST['photo'];
    $sName = addslashes($_POST['name']);
    $sUsername = addslashes($_POST['username']);
    $sEmail = addslashes($_POST['email']);
    $sPhone = addslashes($_POST['phone']);
    $sAddress = addslashes($_POST['address']);

    try {
        $qUpdate = "UPDATE `u955154186_db_llanes`.`tbl_users` 
            SET `photo`= '".$sPhoto."',
                `fullname` = '{$sName}',
                `phone` = '{$sPhone}',
                `username` = '{$sUsername}',
                `email` = '{$sEmail}',
                `address` = '{$sAddress}',
                `modifydate` = '".date("Y-m-d H:i:s")."'
            WHERE `id` = '{$nId}'
        "; 

        $eUpdate = mysqli_query($dbConn, $qUpdate);

        if ($eUpdate == true) {
            echo "/02-mp/pages/my-account/";

            $qQuery = "SELECT * FROM `u955154186_db_llanes`.`tbl_users` WHERE `username` = '$sUsername' AND `deletedate` IS NULL";
            $eQuery = mysqli_query($dbConn, $qQuery);
            $rows = mysqli_fetch_array($eQuery);
            $_SESSION['img'] = $rows['photo'];

        



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