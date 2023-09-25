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
        
        include("../../includes/db-connect.php");

        $nId = $_GET['id'];

        $qSearch = "SELECT * FROM `u955154186_db_llanes`.`tbl_products` WHERE `id` = '".$nId."'";
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
    
    <title>Edit Product</title>

    <link rel="shortcut icon" href="../assets/images/the-source-favicon-removebg-preview.png" type="image/x-icon">

    <link rel="stylesheet" href="../../../bootstrap-5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/bootstrap-icons.css">
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body id="body-pd">
<?php include ("../../admin/includes/header.php"); ?>

    <!--Container Main start-->
    <div class="height-100 bg-white">

        <div class="container d-flex flex-row flex-wrap">

            <div class="col-md-8 p-2 order-last order-md-first">
                
                <div class="row g-0 d-flex flex-row flex-wrap">

                    <input type="hidden" id="updId" value="<?php echo $rows['id']; ?>">

                    <div class="">               
                        <label class="mt-2" for="updProductName">Product Name</label>
                        <input class="w-100" type="text" id="updProductName" name="updProductName" value="<?php echo $rows['productname']; ?>">
                        <label class="mt-2" for="updCode"> Product Code</label>
                        <input class="w-100" type="text" id="updCode" name="updCode" value="<?php echo $rows['code']; ?>">
                    </div>                   

                    <label class="mt-3" for="updDescription">Description</label>
                    <textarea id="updDescription" name="updDescription" rows="7"><?php echo $rows['description']; ?></textarea>

                    <div class="row g-0">
                        <div class="col-md-6 pe-1">
                            <label class="mt-2" for="updPrice">Price</label>
                            <input class="w-100" type="number" id="updPrice" name="updPrice" value="<?php echo $rows['price']; ?>">
                        </div>
                        <div class="col-md-6 ps-1">
                            <label class="mt-2" for="updQuantity">Quantity</label>
                            <input class="w-100" type="number" id="updQuantity" name="updQuantity" value="<?php echo $rows['quantity']; ?>">                            
                        </div>
                    </div>
                    
                    <button class="btn btn-success my-3" type="button" id="btnUpdProduct">Save Changes</button>

                </div>

            </div>

            <div class="col-12 col-md-4 px-2 py-4 order-first order-md-last">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="d-flex justify-content-center align-items-center" id="dropBox" style="background-image: url('<?php echo "../".$rows['photo']; ?>');">
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
<script src="../../../bootstrap-5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/js/jquery-3.6.3.min.js"></script>
<script src="../../assets/js/scripts.js"></script>
<script src="../../assets/js/loading-overlay.min.js"></script>
<script src="../js/saveimage.js"></script>
<script src="../js/updateproduct.js"></script>