<?php
    session_start();

    if(isset($_SESSION['username']) && $_SESSION['username'] != "") {
        $sUserSession = $_SESSION['username'];
        $sUserLevel = $_SESSION['level'];
        // if($sUserLevel == 'lvl2'){
        //     $welcomeMsg = 'You can Read, Update, and Delete User Information.';
        // }else if ($sUserLevel == 'lvl1'){
        //     $welcomeMsg = 'You can Read and Update User Information.';
        // } else {
        //     $welcomeMsg = 'You can Create, Read, Update, and Delete User Information. You can also manually activate/deactivate user accounts.';
        // }
        // echo $sUserLevel;
    } else {
        header("Location: ../login");
        exit();
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Add User</title>

    <link rel="stylesheet" href="/bootstrap-5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="/02-mp/assets/css/bootstrap-icons.css">
    <link rel="stylesheet" href="/02-mp/assets/css/styles.css">
</head>
<body id="body-pd">
<?php include ("../../includes/header.php"); ?>

    <!--Container Main start-->
    <div class="height-100 bg-white">

        <div class="container d-flex flex-row flex-wrap">

            <div class="col-md-8 p-2 order-last order-md-first">
                
                <div class="row g-0 d-flex flex-row flex-wrap">

                    <label class="mt-2" for="txtFullName">Full Name</label>
                    <input type="text" id="txtFullName" name="txtFullName">

                    <label class="mt-2" for="txtPosition">Position</label>
                    <select name="txtPosition" id="txtPosition">
                        <option value="teller">Teller</option>
                        <option value="supervisor">Supervisor</option>
                        <option value="administrator">Administrator</option>
                    </select>

                    <label class="mt-2" for="txtUsername">Username</label>
                    <input type="text" id="txtUsername" name="txtUsername">
                    <span class="uvm"></span>

                    <label class="mt-2" for="txtEmail">Email</label>
                    <input type="text" id="txtEmail" name="txtEmail">
                    <span class="evm"></span>

                    <label class="mt-2" for="txtAccess">Access Level</label>
                    <select name="txtAccess" id="txtAccess">
                        <option value="lvl1">Level 1</option>
                        <option value="lvl2">Level 2</option>
                        <option value="lvl3">Level 3</option>
                    </select>
                    
                    <button class="btn btn-success mt-3" type="button" id="btnAddUser">Add User</button>

                </div>

            </div>

            <div class="col-12 col-md-4 px-2 py-4 order-first order-md-last">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="d-flex justify-content-center align-items-center" id="dropBox">
                        <p id="txtonimg">Select file to upload</p>
                    </div>
                    <input type="file" name="file" id="fileToUpload" accept="image/*">
                </form>
            </div>

        </div> 
    
    </div>
    <!--Container Main end-->
    
</body>
</html>
<script src="/bootstrap-5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="/02-mp/assets/js/jquery-3.6.3.min.js"></script>
<script src="/02-mp/assets/js/loading-overlay.min.js"></script>
<script src="/02-mp/assets/js/scripts.js"></script>
<script src="../js/saveimage.js"></script>
<script src="../js/adduser.js"></script>