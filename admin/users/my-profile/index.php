<?php
    session_start();

    if(isset($_SESSION['username']) && $_SESSION['username'] != "") {
        $sUserSession = $_SESSION['username'];
        $sUserLevel = $_SESSION['level'];
        if($sUserLevel == 'lvl2'){
            $welcomeMsg = 'You can Read, Update, and Delete User Information.';
        }else if ($sUserLevel == 'lvl1'){
            $welcomeMsg = 'You can Read and Update User Information.';
        } else {
            $welcomeMsg = 'You can Create, Read, Update, and Delete User Information. You can also manually activate/deactivate user accounts.';
        }

        include("../../../includes/db-connect.php");
        
        $nId = $_GET['id'];

        $qSearch = "SELECT * FROM `u955154186_db_llanes`.`tbl_users` WHERE `id` = '".$nId."'";
        $eSearch = mysqli_query($dbConn, $qSearch);

        $rows = mysqli_fetch_array($eSearch); 

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
    
    <title>Edit User</title>

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

                <input type="hidden" id="updIdUser" value="<?php echo $rows['id']; ?>">
                
                <div class="row g-0 d-flex flex-row flex-wrap">

                    <label class="mt-2" for="updFullName">Full Name</label>
                    <input type="text" id="updFullName" name="updFullName" value="<?php echo $rows['fullname']; ?>">

                    <label class="mt-2" for="updPosition" style="display:<?php echo $is_level1 = ($sUserLevel == 'lvl1' || $sUserLevel == 'lvl2') ? 'none' : false; ?>;">Position</label>
                    <select name="updPosition" id="updPosition" value="<?php echo $rows['position']; ?>" style="display:<?php echo $is_level1 = ($sUserLevel == 'lvl1' || $sUserLevel == 'lvl2') ? 'none' : false; ?>;">
                        <option value="teller" <?php echo $is_selected = ($rows['position'] == 'teller') ? 'selected' : false; ?>>Teller</option>
                        <option value="supervisor" <?php echo $is_selected = ($rows['position'] == 'supervisor') ? 'selected' : false; ?>>Supervisor</option>
                        <option value="administrator" <?php echo $is_selected = ($rows['position'] == 'administrator') ? 'selected' : false; ?>>Administrator</option>
                    </select>

                    <label class="mt-2" for="updUsername">Username</label>
                    <input type="text" id="updUsername" name="updUsername" value="<?php echo $rows['username']; ?>">
                    <span class="uvm"></span>

                    <label class="mt-2" for="updEmail">Email</label>
                    <input type="text" id="updEmail" name="updEmail" value="<?php echo $rows['email']; ?>">
                    <span class="evm"></span>

                    <label class="mt-2" for="updAccess" style="display:<?php echo $is_level1 = ($sUserLevel == 'lvl1' || $sUserLevel == 'lvl2') ? 'none' : false; ?>;">Access Level</label>
                    <select name="updAccess" id="updAccess" value="<?php echo $rows['accesslevel']; ?>" style="display:<?php echo $is_level1 = ($sUserLevel == 'lvl1' || $sUserLevel == 'lvl2') ? 'none' : false; ?>;">
                        <option value="lvl1" <?php echo $is_selected = ($rows['accesslevel'] == 'lvl1') ? 'selected' : false; ?>>Level 1</option>
                        <option value="lvl2" <?php echo $is_selected = ($rows['accesslevel'] == 'lvl2') ? 'selected' : false; ?>>Level 2</option>
                        <option value="lvl3" <?php echo $is_selected = ($rows['accesslevel'] == 'lvl3') ? 'selected' : false; ?>>Level 3</option>
                    </select>
                    
                    <div class="div-change-pass py-2">
                        <button class="btn btn-secondary btn-sm" type="button" id="btnChangePass">Change Password</button>
                    </div>
                    
                    
                    <button class="btn btn-success mt-3" type="button" id="btnUpdUser">Save Changes</button>

                </div>

            </div>

            <div class="col-12 col-md-4 px-2 py-4 order-first order-md-last">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="d-flex justify-content-center align-items-center" id="dropBox" style="background-image: url('<?php echo $rows['photo']; ?>');">
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
<script src="../js/changepass.js"></script>
<script src="../js/edituser.js"></script>