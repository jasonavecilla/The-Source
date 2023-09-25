<?php

    include("../../includes/db-connect.php");
    
    if ($dbConn == true) {

        $nId = $_POST['id'];
        $sCode = addslashes($_POST['code']);
        $sName = addslashes($_POST['name']);
        $sDescription = addslashes($_POST['description']);
        $nPrice = $_POST['price'];
        $nQuantity = $_POST['quantity'];
        $sFile = $_POST['file'];

        try {
            $qUpdate = "UPDATE `u955154186_db_llanes`.`tbl_products`
                        SET
                            `code` = '".$sCode."',
                            `productname` = '".$sName."',
                            `description` = '".$sDescription."',  
                            `price`= '".$nPrice."',
                            `quantity`= '".$nQuantity."',
                            `photo`= '".$sFile."',
                            `modifydate`= '".date("Y-m-d H:i:s")."'
                        WHERE `id` = '".$nId."'
            ";
            
            $eUpdate = mysqli_query($dbConn, $qUpdate);

            if ($eUpdate == true) {
                echo "Record successfully updated!";
            } else {
                echo "Failed to process, please call system administrator!";
            }

        } catch(Exception $e) {
            echo "error";
        }

    } else {
        echo "Failed to connect, please call system administrator!";
    }


    