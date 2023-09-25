<?php

include("../../../includes/db-connect.php");
include('../../../phpmailer/class.phpmailer.php');

function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

if ($dbConn == true) {

    $sPhoto = $_POST['photo'];
    $sName = addslashes($_POST['name']);
    $sPosition = $_POST['position'];
    $sUsername = addslashes($_POST['username']);
    $sEmail = addslashes($_POST['email']);
    $sPassword = randomPassword();
    $sAccess = $_POST['access'];
    $sOtp = randomPassword();

    try {
        $qInsert = "INSERT INTO `u955154186_db_llanes`.`tbl_users` 
            (`photo`, `fullname`, `position`, `username`, `email`, `password`, `accesslevel`, `otp`, `status`, `entrydate`) 
            VALUES 
            ('".$sPhoto."', '{$sName}', '{$sPosition}', '{$sUsername}', '{$sEmail}', '".$sPassword."', '".$sAccess."', '".$sOtp."', 'pending', '".date("Y-m-d H:i:s")."')
        ";

        $eInsert = mysqli_query($dbConn, $qInsert);


        if ($eInsert == true) {

            echo 'Record sucessfully saved';

            $mail = new PHPMailer();
 
            // $mail->IsSMTP();
            // $mail->SMTPAuth 	= true;
            // $mail->Host 		= 'smtp.hostinger.com';
            // $mail->Username 	= 'wd49p.main@wd49p.com';
            // $mail->Password 	= 'Wd49PM@in';
            // $mail->From 		= 'wd49p.main@wd49p.com';
            // $mail->FromName 	= "WD49P Developers";
            // $mail->SMTPSecure 	= 'ssl';
            // $mail->Port 		= 465;

            $mail->IsSMTP();
            $mail->SMTPAuth 	= true;
            $mail->Host 		= 'smtp.gmail.com';
            $mail->Username 	= 'fr3d.1lanes@gmail.com';
            $mail->Password 	= 'sbezvakzzbszgxdy';
            $mail->From 		= 'fr3d.1lanes@gmail.com';
            $mail->FromName 	= "WD49P PHP Mailer";
            $mail->SMTPSecure 	= 'ssl';
            $mail->Port 		= 465;
            
            // $mail->AddCC("jesthonymorales@gmail.com", "Jesthony Morales");
            $mail->AddAddress("fr3d.1lanes@gmail.com", "Ted Llanes");
            $mail->AddAddress("jonalyn.boaloy@gmail.com", "Jonalyn Boaloy");
            // $mail->AddAddress("avecillajason77@gmail.com", "Jason Avecilla");
            
            $mail->Subject = "New message user added:"." ".$sName." [".$sEmail."]";
            $mail->Body = nl2br("   Name: ".$sName."
                                    Position: ".$sPosition."
                                    Username: ".$sUsername."
                                    Email: ".$sEmail."
                                    Password: ".$sPassword."
                                    Access Level: ".$sAccess);			
            $mail->IsHTML(true);

            if(!$mail->Send()) {

                echo "failed to send!";

            } else {
                echo "\n\n Admin/s are notified!";
            }  
            
            $mailtoUser = new PHPMailer();

            $mailtoUser->IsSMTP();
            $mailtoUser->SMTPAuth 	= true;
            $mailtoUser->Host 		= 'smtp.gmail.com';
            $mailtoUser->Username 	= 'fr3d.1lanes@gmail.com';
            $mailtoUser->Password 	= 'sbezvakzzbszgxdy';
            $mailtoUser->From 		= 'fr3d.1lanes@gmail.com';
            $mailtoUser->FromName 	= "WD49P PHP Mailer";
            $mailtoUser->SMTPSecure 	= 'ssl';
            $mailtoUser->Port 		= 465;
            
            // $mail->AddCC("jesthonymorales@gmail.com", "Jesthony Morales");
            $mailtoUser->AddCC("fr3d.1lanes@gmail.com", "Ted Llanes");
            $mailtoUser->AddCC("jonalyn.boaloy@gmail.com", "Jonalyn Boaloy");
            // $mailtoUser->AddCC("avecillajason77@gmail.com", "Jason Avecilla");

            $mailtoUser->AddAddress($sEmail, $sName);
            
            $mailtoUser->Subject = "Welcome to the team:"." ".$sName." [".$sEmail."]";
            $mailtoUser->Body = nl2br("Hi ".$sName.",
                                    Please use your credentials responsibly,   
                                    Name: ".$sName."
                                    Position: ".$sPosition."
                                    Username: ".$sUsername."
                                    Temporary Password: ".$sPassword."
                                    Access Level: ".$sAccess."                                    
                                    Please follow the link here <a href='https://llanes.wd49p.com/02-mp/activate.php?username=".$sUsername."'>Activate Account</a> and provide your otp <b>".$sOtp."</b> to proceed logging in to your account.");
            $mailtoUser->IsHTML(true);

            if(!$mailtoUser->Send()) {
                echo "failed to send!";
            } else {
                echo "\n\n Sent invite with otp to user for activation...";
            } 


        } else {
            echo "Failed to process, please call system administrator!";
        }

    } catch(Exception $e) {
        echo "error";
    }   


} else {
    echo 'failed to connect!';
}