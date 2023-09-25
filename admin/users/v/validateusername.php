<?php

include("../../../includes/db-connect.php");

if ($dbConn == true) {
    $vUser = addslashes($_POST['user']);

    if($vUser) {
        $qQuery = "SELECT * FROM `u955154186_db_llanes`.`tbl_users` WHERE `username` = '$vUser' AND `deletedate` IS NULL";
        $eQuery = mysqli_query($dbConn, $qQuery);
        $nRowCount = mysqli_num_rows($eQuery);
        if ($nRowCount > 0) {
            echo "exist";
        } else {
            echo "does not exist";
        }
    }

}