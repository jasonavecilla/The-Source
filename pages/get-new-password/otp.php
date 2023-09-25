<?php

    session_start();

    if(isset($_SESSION['username']) && $_SESSION['username'] != "") {
        $sUserSession = $_SESSION['username'];
        $sUserLevel = $_SESSION['level'];

        // header("Location: admin");
        // exit();
        
    } else {

        include("../../includes/db-connect.php");

        if($_GET['id'] != '') {

            $nId = $_GET['id'];

            $qSearch = "SELECT * FROM `u955154186_db_llanes`.`tbl_users` WHERE `id` = '".$nId."' AND `deletedate` IS NULL";
            $eSearch = mysqli_query($dbConn, $qSearch);

            $rows = mysqli_fetch_array($eSearch);


        } else {
            header("Location: /02-mp/pages/login");
            exit();
        }       
        
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Get New Password</title>

    <link rel="shortcut icon" href="../assets/images/the-source-favicon-removebg-preview.png" type="image/x-icon">

    <link rel="stylesheet" href="../../../bootstrap-5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap-icons.css">
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/styles.css">

</head>

<body>

    <div class="div-gnp vh-100 py-5">

    <div class="container d-flex justify-content-center position-relative logo-container mb-5">

        <img class="flex-shrink-0 me-2 logo-img" src="/02-mp/pages/assets/images/the-source-favicon-removebg-preview.png" width="90px" alt="the source logo">

        <div class="align-self-center">

            <h2 class="logo-name"> <a class="stretched-link" href="/02-mp/pages/"> the source </a> </h2>
            <p class="logo-slogan"> everyting fresh </p>
        
        </div>

    </div>

    <h1 class="page-title text-center">Provide OTP</h1>

        <div class="p-4 m-auto shadow rounded" style="max-width: 200px; min-height:150px; background-color: #efefef;">
        
            <div class="d-flex flex-column justify-content-center align-items-center">
                
                <input class="w-100" id="sOtpUserId" type="hidden" value="<?php echo $rows['id']; ?>">
                <input class="w-100" id="sOtp" type="text">               
                
                <button type="submit" class="btn btn-primary mt-3 w-100" id="btnGetNewPass">Get New Password</button>
                                
            </div>
            <span id="errMsg"></span>
        
        </div>

    </div>    
    
</body>

</html>
<script src="../../../bootstrap-5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/js/jquery-3.6.3.min.js"></script>
<script src="/02-mp/assets/js/loading-overlay.min.js"></script>
<script src="../../assets/js/sendnewpass.js"></script>