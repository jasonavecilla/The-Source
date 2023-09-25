
<?php
    session_start();

    if(isset($_SESSION['username']) && $_SESSION['username'] != "") {
        header("Location: ../admin");
        exit();
    } 
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Login</title>

    <link rel="shortcut icon" href="../assets/images/the-source-favicon-removebg-preview.png" type="image/x-icon">

    <link rel="stylesheet" href="../../bootstrap-5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="/02-mp/pages/assets/css/styles.css">

</head>

<body>

    <div class="row p-4">

        <div class="container d-flex justify-content-center position-relative logo-container">

            <img class="flex-shrink-0 me-2 logo-img" src="/02-mp/pages/assets/images/the-source-favicon-removebg-preview.png" width="90px" alt="the source logo">

            <div class="align-self-center">

                <h2 class="logo-name"> <a class="stretched-link" href="/02-mp/pages/"> the source </a> </h2>
                <p class="logo-slogan"> everyting fresh </p>
            
            </div>

        </div>

        <div class="container col-md-6 p-4 my-3 shadow rounded" style="background-color: #efefef; max-width: 500px;">
        
            <div class="d-flex flex-column justify-content-center align-items-center">

            <h3 class="page-title text-center">Login</h3>
                
                <div class="d-flex flex-column mt-3 w-100">
                    <label for="login-username">Username</label>
                    <input id="login-username" type="text" required>
                </div>

                <div class="d-flex flex-column w-100">
                    <label for="login-password">Password</label>
                    <input id="login-password" type="password" required>
                </div>
                <span class="my-2" id="lgnMsg"></span>
                
                <button type="submit" class="btn btn-primary mb-4 w-100" id="btn_login">Login</button>

                <div class="d-flex flex-row justify-content-between w-100">
                    <a href="/02-mp/pages"><< Back to Homepage</a>
                    <a href="/02-mp/forgot-password">Forgot Password >></a>
                </div>
                
            </div>
        
        </div>

    </div>    
    
</body>

</html>
<script src="../../bootstrap-5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/jquery-3.6.3.min.js"></script>
<script src="../assets/js/loading-overlay.min.js"></script>
<script src="../assets/js/login.js"></script>