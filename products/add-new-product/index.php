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
    
    <title>Add New Product</title>

    <link rel="shortcut icon" href="../images/the-source-favicon-removebg-preview.png" type="image/x-icon">

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

                    <div class="">               
                        <label class="mt-2" for="txtProductName">Product Name</label>
                        <input class="w-100" type="text" id="txtProductName" name="txtProductName">
                        <label class="mt-2" for="txtCode"> Product Code</label>
                        <input class="w-100" type="text" id="txtCode" name="txtCode">
                    </div>                   

                    <label class="mt-3" for="txtDescription">Description</label>
                    <textarea id="txtDescription" name="txtDescription" rows="7"></textarea>

                    <div class="row g-0">
                        <div class="col-md-6 pe-1">
                            <label class="mt-2" for="nPrice">Price</label>
                            <input class="w-100" type="number" id="nPrice" name="nPrice">
                        </div>
                        <div class="col-md-6 ps-1">
                            <label class="mt-2" for="nQuantity">Quantity</label>
                            <input class="w-100" type="number" id="nQuantity" name="nQuantity">                            
                        </div>
                    </div>
                    
                    <button class="btn btn-success my-3" type="button" id="btnAddProduct">Add Product</button>

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
<script src="../../../bootstrap-5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/js/jquery-3.6.3.min.js"></script>
<script src="../../assets/js/loading-overlay.min.js"></script>
<script src="../../assets/js/scripts.js"></script>
<script src="../js/saveimage.js"></script>
<script src="../js/addproduct.js"></script>