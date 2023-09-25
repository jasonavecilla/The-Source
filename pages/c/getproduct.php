<?php
include("../../includes/db-connect.php");

$sCode = $_POST['code'];

if($dbConn == true){

    $qQuery = " SELECT * FROM `u955154186_db_llanes`.`tbl_products` WHERE `code` = '$sCode' ";
    $eQuery = mysqli_query($dbConn, $qQuery);

    if ($eQuery == true) {

        $rows = mysqli_fetch_assoc($eQuery);

        echo json_encode($rows);

    }
}

?>