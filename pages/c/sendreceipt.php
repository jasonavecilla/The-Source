<?php
session_start();

include("../../includes/db-connect.php");
include('../../phpmailer/class.phpmailer.php');

if($dbConn == true) {

    $TIN = $_POST['tin'];

    $qSelect = " SELECT * FROM `u955154186_db_llanes`.`tbl_transactions`
    WHERE `tn` = '{$TIN}'
    ";

    $eSelect = mysqli_query($dbConn, $qSelect); 

    if ($eSelect == true) {

        $oFile = fopen('../receipts/' . $TIN . '.csv', "wa+");

        fwrite($oFile, "Transaction identification number:,".$TIN."\n");
        fwrite($oFile, "PRODUCT,QUANTITY,PRICE,TOTAL AMOUNT\n");
        while($pRows = mysqli_fetch_assoc($eSelect)) {
            fwrite($oFile, '"'.$pRows['product'].'","'.$pRows['quantity'].'","'.$pRows['price'].'","'.$pRows['amount'].'"');
            fwrite($oFile, "\n");
        }
        fclose($oFile);

    } else {
        echo "error";
    }

    $mail = new PHPMailer();

    $mail->IsSMTP();
    $mail->SMTPAuth 	= true;
    $mail->Host 		= 'smtp.gmail.com';
    $mail->Username 	= 'fr3d.1lanes@gmail.com';
    $mail->Password 	= 'sbezvakzzbszgxdy';
    $mail->From 		= 'fr3d.1lanes@gmail.com';
    $mail->FromName 	= "WD49P PHP Mailer";
    $mail->SMTPSecure 	= 'ssl';
    $mail->Port 		= 465;
    
    
    $mail->AddAddress('"'.$cEA.'"', '"'.$cFN.'"' );
    $mail->AddBCC("fr3d.1lanes@gmail.com", "Ted Llanes");

    $mail->addAttachment('../receipts/' . $TIN . '.csv');


    $mail->Subject = "Receipt from: MP2";
    $mail->Body = nl2br("transaction number: " . $TIN);		
    $mail->IsHTML(true);
    

    if(!$mail->Send()) {
        echo "sent";
    } else {
        echo "sent";
    }
}