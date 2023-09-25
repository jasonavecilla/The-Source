<?php
    session_start();

    if(isset($_SESSION['username']) && $_SESSION['username'] != "") {
        $sUserSession = $_SESSION['username'];
        $sUserLevel = $_SESSION['level'];

        include("../../includes/db-connect.php");
        
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

  <title>Ted Llanes - MP2 | the source | my account - edit profile </title>

  <link rel="shortcut icon" href="../assets/images/the-source-favicon-removebg-preview.png" type="image/x-icon">
  
  <link rel="stylesheet" href="../assets/bootstrap-5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/bootstrap-icons.css">
  <link rel="stylesheet" href="../assets/css/styles.css">
  <link rel="stylesheet" href="../assets/css/media-breakpoints.css">

</head>

<body id="body-pd">
<?php include ("../inc/header.php"); ?>

    <!--Container Main start-->
    <div class="height-100 bg-white my-5">

        <div class="container d-flex flex-row flex-wrap">

            <div class="col-md-8 p-2 order-last order-md-first">

                <input type="hidden" id="updIdUser" value="<?php echo $rows['id']; ?>">
                
                <div class="row g-0 d-flex flex-row flex-wrap">

                    <label class="mt-2" for="updFullName">Full Name</label>
                    <input type="text" id="updFullName" name="updFullName" value="<?php echo $rows['fullname']; ?>">

                    <label class="mt-2" for="updUsername">Username</label>
                    <input type="text" id="updUsername" name="updUsername" value="<?php echo $rows['username']; ?>">
                    <span class="uvm"></span>

                    <label class="mt-2" for="updEmail">Email</label>
                    <input type="text" id="updEmail" name="updEmail" value="<?php echo $rows['email']; ?>">
                    <span class="evm"></span>

                    <label class="mt-2" for="updPhone">Phone</label>
                    <input type="text" id="updPhone" name="updPhone" value="<?php echo $rows['phone']; ?>">

                    <label class="mt-2" for="updAddress">Address</label>
                    <textarea id="updAddress" name="updPhone" rows="3"><?php echo $rows['address']; ?></textarea>
                    
                    <button class="btn btn-primary mt-3" type="button" id="btnUpdUser">Save Changes</button>

                </div>

            </div>

            <div class="col-12 col-md-4 px-2 py-4 order-first order-md-last">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="d-flex justify-content-center align-items-center" id="dropBox" style="background-image: url('/02-mp/admin/users/<?php echo substr($rows['photo'],3); ?>');">
                        <p id="txtonimg">Select file to upload</p>
                    </div>
                    <input type="file" name="file" id="fileToUpload" accept="image/*">
                </form>
            </div>

        </div> 
            
    </div>
    <!--Container Main end-->

    <?php include ("../inc/footer.php"); ?>
    
</body>
</html>
<script src="/bootstrap-5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="/02-mp/assets/js/jquery-3.6.3.min.js"></script>
<script src="/02-mp/assets/js/loading-overlay.min.js"></script>
<script src="/02-mp/assets/js/scripts.js"></script>
<script src="/02-mp/pages/assets/js/saveimage.js"></script>
<script src="/02-mp/pages/assets/js/editcust.js"></script>