<?php

session_start();

include ("../../includes/db-connect.php");

if($dbConn == true) {
    $sUsername = addslashes($_POST['username']);    
    $sPassword = addslashes($_POST['password']);

    try {
        $qQuery = "SELECT * FROM `u955154186_db_llanes`.`tbl_users` WHERE `username` = '$sUsername' AND `deletedate` IS NULL";
        $eQuery = mysqli_query($dbConn, $qQuery);

        if($eQuery) {
            $nRowCount = mysqli_num_rows($eQuery);
            $rows = mysqli_fetch_array($eQuery);

            if( $nRowCount > 0) {
                if ($rows['status'] == 'active') {
                    if ($rows['password'] == $sPassword) {
                        $_SESSION['username'] = $sUsername;
                        $_SESSION['level'] = $rows['accesslevel'];
                        $_SESSION['position'] = $rows['position'];
                        $_SESSION['img'] = $rows['photo'];
                        $_SESSION['id'] = $rows['id'];
                        $_SESSION['fname'] = $rows['fullname'];
                        $_SESSION['email'] = $rows['email'];
                        $_SESSION['address'] = $rows['address'];
                        $_SESSION['phone'] = $rows['phone'];                        
                        $_SESSION['tn'] = $rows['id'] . "-" . date('Ymd') . "-";
                        echo "/02-mp/pages/my-account";                    
                        mysqli_close($dbConn);
                    } else {
                        echo "Username and password does not match!";
                        mysqli_close($dbConn);
                    }
                } else {
                    echo "Please contact administrator to activate your account!";
                    mysqli_close($dbConn);
                }            
            } else {
                echo "Username does not exist!";
                mysqli_close($dbConn);
            }

        } else {
            echo "Username does not exist!";
            mysqli_close($dbConn);
        }               

    } catch(Exception $e) {
        echo "error";
    }

} else {
    echo 'failed to connect!';
}