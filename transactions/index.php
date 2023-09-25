<?php
    session_start();

    if(isset($_SESSION['username']) && $_SESSION['username'] != "") {
        if ($_SESSION['level'] == "lvl0") {
          header("Location: /02-mp/pages");
          exit();
        }
        
    } else {
        header("Location: ../login");
        exit();
    }

    $sPage = 'transactions';
    
    include("../includes/db-connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Transactions</title>

    <link rel="shortcut icon" href="../assets/images/the-source-favicon-removebg-preview.png" type="image/x-icon">

    <link rel="stylesheet" href="../../bootstrap-5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body id="body-pd">
<?php include ("../admin/includes/header.php"); ?>

    <!--Container Main start-->
    <div class="height-100 bg-white">

        <div class="container d-flex flex-row flex-wrap">

            <div class="col-12 py-4 d-flex flex-column">

                <table class="table table-striped shadow">
                    <thead class="bg-success text-light">
                        <tr>
                        <th>Customer</th>
                        <th>TIN</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Amount</th>            
                        <th>Date</th>
                        </tr>
                    </thead>

                    <tbody id="">

                        <?php
                            if($dbConn == true){

                                $qQuery = " SELECT * FROM `u955154186_db_llanes`.`tbl_transactions`
                                            ORDER BY id DESC, tn
                                        ";    
                                $eQuery = mysqli_query($dbConn, $qQuery);
                                if ($eQuery == true) {
                        
                                    $sHtml = "";
                            
                                    while($rows = mysqli_fetch_array($eQuery)) {
                            
                                        $sHtml .= ' <tr>
                                                    <td><p>'.$rows["custname"].'</p></td>
                                                    <td><p>'.$rows["tn"].'</p></td>
                                                    <td><p class="fw-bold">'.$rows["product"].'</p></td>
                                                    <td><p>'.$rows["price"].'</p></td>
                                                    <td><p>'.$rows["quantity"].'</p></td>
                                                    <td><p>'.$rows["amount"].'</p></td>
                                                    <td><p>'.$rows["transactiondate"].'</p></td>
                                                    </tr>
                                        
                                        ';
                                    }
                            
                                    echo $sHtml;
                                    mysqli_close($dbConn);
                                }
                            
                            
                            } else {
                                echo 'failed to connect!';
                            }
                        ?>

                    </tbody>
                </table> 
            </div>      
        </div>
    </div>
    <!--Container Main end-->
    
</body>
</html>
<script src="../../bootstrap-5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/jquery-3.6.3.min.js"></script>
<script src="../assets/js/scripts.js"></script>