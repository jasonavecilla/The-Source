<?php

include("../../includes/db-connect.php");

if ($dbConn == true) {

    $sCode = addslashes($_POST['code']);
    $sName = addslashes($_POST['name']);
    $sDescription = addslashes($_POST['description']);
    $nPrice = $_POST['price'];
    $nQuantity = $_POST['quantity'];
    $sFile = $_POST['file'];

    try {
        $qInsert = "INSERT INTO `u955154186_db_llanes`.`tbl_products` 
            (`code`, `productname`, `description`, `price`, `quantity`, `photo`, `entrydate`) 
            VALUES 
            ('".$sCode."', '{$sName}', '{$sDescription}', '{$nPrice}', '{$nQuantity}', '".$sFile."', '".date("Y-m-d H:i:s")."')
        ";

        $eInsert = mysqli_query($dbConn, $qInsert);

        if ($eInsert == true) {
            echo "Record successfully saved!";
        } else {
            echo "Failed to process, please call system administrator!";
        }

    } catch(Exception $e) {
        echo "error";
    }   

} else {
    echo 'failed to connect!';
}