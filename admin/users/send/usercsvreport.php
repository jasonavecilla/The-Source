<?php

include("../../../includes/db-connect.php");
include('../../../phpmailer/class.phpmailer.php');

if ($dbConn == true) {

    $sEmails = $_POST['emails'];
    $sCCs = $_POST['ccs'];
    $sBCCs = $_POST['bccs'];

    $aEmails = array_map('trim', explode(',', $sEmails));
    $aCCs = array_map('trim', explode(',', $sCCs));
    $aBCCs = array_map('trim', explode(',', $sBCCs));

    $qQuery = " SELECT * FROM `u955154186_db_llanes`.`tbl_users`
                WHERE `deletedate` IS NULL
                ORDER BY id ASC    
    ";

    $eQuery = mysqli_query($dbConn, $qQuery); 

    if ($eQuery == true) {

        $oFile = fopen('../files/users.csv', "wa+");

        fwrite($oFile, "ID,NAME,POSITION,USERNAME,EMAIL,ACCESS, STATUS\n");
        while($rows = mysqli_fetch_assoc($eQuery)) {
            fwrite($oFile, '"'.$rows['id'].'","'.$rows['fullname'].'","'.$rows['position'].'","'.$rows['username'].'","'.$rows['email'].'","'.$rows['accesslevel'].'","'.$rows['status'].'"');
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
    
    
    $mail->AddAddress("fr3d.1lanes@gmail.com", "Ted Llanes");
    foreach ($aEmails as $email) {
        $mail->AddAddress( $email, "");        
    }
    // $mail->AddAddress("fourthcesar@gmail.com", "Cesar Cabatit");
    // $mail->AddAddress("danielngdxb@gmail.com", "Daniel Ng");
    // $mail->AddAddress("yanzimaki@gmail.com", "Cyan Mikey");
    // $mail->AddAddress("jetertrajano2018@gmail.com", "Jeter Trajano");
    // $mail->AddAddress("joeversonrempis22@gmail.com", "Joeverson Rempis");
    // $mail->AddAddress("jonalyn.boaloy@gmail.com", "Jonalyn Boaloy");
    // avecillajason77@gmail.com

    // $mail->AddCC("jesthonymorales@gmail.com", "Jesthony Morales");
    foreach ($aCCs as $email) {
        $mail->AddCC( $email, "");        
    }


    // $mail->AddBCC("jesthonymorales@gmail.com", "Jesthony Morales");
    foreach ($aBCCs as $email) {
        $mail->AddBCC( $email, "");        
    }


    $mail->addAttachment("../files/users.csv");


    $mail->Subject = "New message from: MP2 - Ted Llanes";
    $mail->Body = nl2br("testing send users csv report");		
    $mail->IsHTML(true);
    

    if(!$mail->Send()) {
        return "sent";
    } else {
        echo "sent";
    }
    
}
