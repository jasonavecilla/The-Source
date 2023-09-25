<?php

include("../includes/db-connect.php");
include('../phpmailer/class.phpmailer.php');

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
    $nId = $_POST['id'];    
    $sOtp = $_POST['sotp'];
    $sNewPass = randomPassword();

    try {
        $qQuery = "SELECT * FROM `u955154186_db_llanes`.`tbl_users` WHERE `id` = '$nId'";
        $eQuery = mysqli_query($dbConn, $qQuery);

        $rows = mysqli_fetch_array($eQuery);
        $sEmail = $rows['email'];

        if( $rows['otp'] == $sOtp ) {
            $qUpdate = "UPDATE `u955154186_db_llanes`.`tbl_users`
                        SET  `password` = '$sNewPass'
                        WHERE `id` = '$nId'
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
                
                $mail->Subject = "New Password is sent to:"." ".$sEmail;
                $mail->Body = nl2br("new password: ".$sNewPass);			
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
                
                $mailtoUser->Subject = "Here is your new password";
                $mailtoUser->Body = nl2br("new password: ".$sNewPass."
                                    You can <a href='https://llanes.wd49p.com/02-mp/login/'>login here</a>");
                $mailtoUser->IsHTML(true);
    
                if(!$mailtoUser->Send()) {
                    echo "failed to send!";
                } else {
                    echo "\n\n Sent new password to user...";
                }
    
            } else {
                echo "Failed to process, please call system administrator!";
                mysqli_close($dbConn);
            }

            
        } else {
            echo "You provided a wrong otp, please try again";
            mysqli_close($dbConn);
        }

    } catch(Exception $e) {
        echo "error";
    }

} else {
    echo 'failed to connect!';
}