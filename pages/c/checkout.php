<?php
session_start();

include("../../includes/db-connect.php");
include('../../phpmailer/class.phpmailer.php');

if($dbConn == true){

    // code: "fr001"
    // id: "7"
    // image: "../products/images/1682959874_engin-akyurt-eb26eV-ys_k-unsplash.jpg"
    // price: "80"
    // product: "Fruit 1"
    // qtyavailable: "40"
    // qtybuying: "2"
    // tin: "24-20230505-XkizpvWO07"


    // $sPN = $_POST['product'];
    // $sPC = $_POST['code'];
    // $nSQ = $_POST['qtybuying'];
    // $nPP = $_POST['price'];
    // $nTA = $_POST['price']*$_POST['qtybuying'];
    // $img = $_POST['image'];
    // $TIN = $_POST['tin'] . "-" . date('H');
    // $cFN = $_POST['custname'];
    // $cUN = $_POST['custun'];
    // $cEA = $_POST['custmail'];
    // $cPA = $_POST['custaddress'];
    // $cPM = $_POST['pay'];

    $arrP = $_POST['data'];

    // print_r($arrP);
    // die();

    for($x = 0; $x < sizeof($arrP); $x++) {
        $sPN = $arrP[$x]['product'];
        $sPC = $arrP[$x]['code'];
        $nSQ = $arrP[$x]['qtybuying'];
        $nPP = $arrP[$x]['price'];
        $nTA = $arrP[$x]['price']*$arrP[$x]['qtybuying'];
        $img = $arrP[$x]['image'];
        $TIN = $arrP[$x]['tin'];
        $cFN = $arrP[$x]['custname'];
        $cUN = $arrP[$x]['custun'];
        $cEA = $arrP[$x]['custmail'];
        $cPA = $arrP[$x]['custaddress'];
        $cPM = $arrP[$x]['pay'];

        try {

            $qInsert = "INSERT INTO `u955154186_db_llanes`.`tbl_transactions` 
                (`tn`, `image`, `product`, `code`, `quantity`, `price`, `amount`, `custname`, `custusername`, `custemail`, `custaddress`, `custpaymethod`, `transactiondate`) 
                VALUES 
                ('".$TIN."', '".$img."', '".$sPN."', '".$sPC."', '".$nSQ."', '".$nPP."', '".$nTA."', '".$cFN."', '".$cUN."', '".$cEA."', '".$cPA."', '".$cPM."', '".date("Y-m-d H:i:s")."')
            ";

            $eInsert = mysqli_query($dbConn, $qInsert);

            if($eInsert == true) {

                try {
                    $qQuery = " SELECT * FROM `u955154186_db_llanes`.`tbl_products` WHERE `code` = '$sPC' ";
                    $eQuery = mysqli_query($dbConn, $qQuery);

                    if ($eQuery == true) {
                        $rows = mysqli_fetch_assoc($eQuery);
                        $newQuantity = $rows['quantity'] - $nSQ;

                        $qUpdate = "UPDATE `u955154186_db_llanes`.`tbl_products` 
                        SET `quantity` = '{$newQuantity}',
                            `modifydate` = '".date("Y-m-d H:i:s")."'
                            WHERE `code` = '{$sPC}'
                        ";        
                        $eUpdate = mysqli_query($dbConn, $qUpdate);                    

                        $_SESSION['mycart'] = array();

                    }

                    
                } catch(Exception $e) {
                    echo "error";
                }


                echo 'transaction successful!';
            }

        } catch(Exception $e) {
            echo "error";
        } 
    }  


} else {
    echo 'failed to connect!';
}