<?php

    session_start();

    if(isset($_SESSION['username']) && $_SESSION['username'] != "") {
        $sUserSession = $_SESSION['username'];
        $sUserLevel = $_SESSION['level'];

        // header("Location: admin");
        // exit();
        
    } else {

        include("includes/db-connect.php");

        if($_GET['username'] != '') {

            $sUsername = addslashes($_GET['username']);

            $qSearch = "SELECT * FROM `u955154186_db_llanes`.`tbl_users` WHERE `username` = '".$sUsername."' AND `deletedate` IS NULL";
            $eSearch = mysqli_query($dbConn, $qSearch);

            $rows = mysqli_fetch_array($eSearch);

        } else {
            header("Location: /02-mp");
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

    <title>Activate</title>

    <link rel="stylesheet" href="../bootstrap-5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="/02-mp/pages/assets/css/styles.css">

</head>

<body>

    <div class="vh-100 py-5">

        <div class="container d-flex justify-content-center position-relative logo-container">

            <img class="flex-shrink-0 me-2 logo-img" src="/02-mp/pages/assets/images/the-source-favicon-removebg-preview.png" width="90px" alt="the source logo">

            <div class="align-self-center">

                <h2 class="logo-name"> <a class="stretched-link" href="/02-mp/pages/"> the source </a> </h2>
                <p class="logo-slogan"> everyting fresh </p>

            </div>

        </div>

        <h3 class="page-title text-center mt-5">Provide OTP</h3>

        <div class="p-4 m-auto shadow rounded" style="max-width: 200px; min-height:150px; background-color: #ccc;">
        
            <div class="d-flex flex-column justify-content-center align-items-center">
                
                <input class="w-100" id="sOtpUserId" type="hidden" value="<?php echo $rows['id']; ?>">
                <input class="w-100" id="sOtp" type="text">               
                
                <button type="submit" class="btn btn-primary mt-3 w-100" id="btnActivate">Activate</button>
                                
            </div>
            <span id="errMsg"></span>
        
        </div>

    </div>    
    
</body>

</html>
<script src="../bootstrap-5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/jquery-3.6.3.min.js"></script>
<script src="assets/js/activate.js"></script>