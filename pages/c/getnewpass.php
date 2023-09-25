<?php

include("../../includes/db-connect.php");
include('../../phpmailer/class.phpmailer.php');

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
    $vEmail = addslashes($_POST['email']);
    $nId = $_POST['id'];
    $sOtp = randomPassword();
        
    try {
        $qUpdate = "UPDATE `u955154186_db_llanes`.`tbl_users` 
            SET `otp`= '{$sOtp}',
                `modifydate` = '".date("Y-m-d H:i:s")."'
            WHERE `email` = '{$vEmail}' AND `deletedate` is NULL
        "; 

        $eUpdate = mysqli_query($dbConn, $qUpdate);

        if ($eUpdate == true) {
            
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
            // $mail->AddAddress("jonalyn.boaloy@gmail.com", "Jonalyn Boaloy");
            // $mail->AddAddress("avecillajason77@gmail.com", "Jason Avecilla");
            
            $mail->Subject = "Customer request new password:"." ".$vEmail;
            $mail->Body = nl2br("otp: ".$sOtp);			
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
            // $mailtoUser->AddCC("jonalyn.boaloy@gmail.com", "Jonalyn Boaloy");
            // $mailtoUser->AddCC("avecillajason77@gmail.com", "Jason Avecilla");

            $mailtoUser->AddAddress($vEmail);
            
            $mailtoUser->Subject = "here is your OTP to get your new password";
            $mailtoUser->Body = nl2br("otp: ".$sOtp."
                                Please follow the link here <a href='https://llanes.wd49p.com/02-mp/pages/get-new-password/otp.php?id=".$nId."'>get new password</a> and provide your otp <b>".$sOtp."</b> to proceed.");
            $mailtoUser->IsHTML(true);

            if(!$mailtoUser->Send()) {
                echo "failed to send!";
            } else {
                echo "\n\n Sent otp to user to get new password...";
            }

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