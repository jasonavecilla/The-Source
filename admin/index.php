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

    $sPage = 'admin';
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Dashboard</title>

    <link rel="shortcut icon" href="../assets/images/the-source-favicon-removebg-preview.png" type="image/x-icon">

    <link rel="stylesheet" href="../../bootstrap-5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body id="body-pd">
<?php include ("includes/header.php"); ?>

    <!--Container Main start-->
    <div class="height-100 bg-white">
        <div class="row pt-4">

            <div class="col-md-6 mb-4">

                <div class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-heading1">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse1" aria-expanded="true" aria-controls="panelsStayOpen-collapse1">
                            <i class='fs-5 bi-globe2 me-3'></i> Website Traffic
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapse1" class="accordion-collapse collapse w-100 show" aria-labelledby="panelsStayOpen-heading1">
                        <div class="accordion-body w-100">
                            <div class="py-1">

                                <div class="card">
                                    <div class="card-body">
                                        <canvas id="chLine"></canvas>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    </div>
                    
                </div>

            </div>

            <div class="col-md-6 mb-4">

                <div class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                            <i class='fs-5 bi-graph-up me-3'></i>
                        Sales Performance
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse w-100 show" aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body w-100">
                            <div class="py-1">

                                <div class="card">
                                    <div class="card-body">
                                        <canvas id="chBar"></canvas>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    </div>
                    
                </div>

            </div>

            </div>

            <div class="row">

            <div class="col-md-6 mb-4">

                <div class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-heading2">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse2" aria-expanded="true" aria-controls="panelsStayOpen-collapse2">
                            <i class='fs-5 bi-grid me-3'></i>
                        Product Inventory
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapse2" class="accordion-collapse collapse w-100 show" aria-labelledby="panelsStayOpen-heading2">
                        <div class="accordion-body w-100">

                            <h4 class="text-center">TOP 3 PRODUCT</h4>
                            <table class="table table-striped mb-3 shadow-sm text-center">
                                <thead class="bg-success text-light">
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Available Qty</th>
                                        <th>Sold Qty</th>
                                        <th>Sold Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Product 1</td>
                                        <td>53</td>
                                        <td>124</td>
                                        <td>12400</td>
                                    </tr>
                                    <tr>
                                        <td>Product 2</td>
                                        <td>23</td>
                                        <td>100</td>
                                        <td>10000</td>
                                    </tr>
                                    <tr>
                                        <td>Product 3</td>
                                        <td>63</td>
                                        <td>98</td>
                                        <td>9800</td>
                                    </tr>
                                </tbody>
                            </table>
                        
                        </div>
                    </div>
                    </div>
                    
                </div>

            </div>

            <div class="col-md-6 mb-4">

                <div class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-heading3">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse3" aria-expanded="true" aria-controls="panelsStayOpen-collapse3">
                            <i class='fs-5 bi-people me-3'></i>
                        Customers
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapse3" class="accordion-collapse collapse w-100 show" aria-labelledby="panelsStayOpen-heading3">
                        <div class="accordion-body w-100">

                            <h5 class="text-center">TOP 3 ACTIVE CUSTOMER</h5>
                            <table class="table table-striped mb-3 shadow-sm text-center">
                                <thead class="bg-success text-light">
                                    <tr>
                                        <th>Name</th>
                                        <th>Last transaction</th>
                                        <th>no. of products</th>
                                        <th>amount of products</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Customer 1</td>
                                        <td>04/10/2023</td>
                                        <td>26</td>
                                        <td>100000</td>
                                    </tr>
                                    <tr>
                                        <td>Customer 2</td>
                                        <td>04/10/2023</td>
                                        <td>23</td>
                                        <td>98000</td>
                                    </tr>
                                    <tr>
                                        <td>Customer 3</td>
                                        <td>04/11/2023</td>
                                        <td>18</td>
                                        <td>92000</td>
                                    </tr>
                                </tbody>
                            </table>

                            <h5 class="text-center">NEW CUSTOMERS</h5>
                            <table class="table table-striped mb-3 shadow-sm text-center">
                                <thead class="bg-success text-light">
                                    <tr>
                                        <th>Name</th>
                                        <th>Registration Date</th>
                                        <th>no. of products</th>
                                        <th>amount of products</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Register 1</td>
                                        <td>04/11/2023</td>
                                        <td>6</td>
                                        <td>8000</td>
                                    </tr>
                                    <tr>
                                        <td>Register 2</td>
                                        <td>04/10/2023</td>
                                        <td>8</td>
                                        <td>15000</td>
                                    </tr>
                                    <tr>
                                        <td>Register 3</td>
                                        <td>04/10/2023</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                </tbody>
                            </table>
                        
                            
                        </div>
                    </div>
                    </div>
                    
                </div>

            </div>

        </div>
    </div>
    <!--Container Main end-->
    
</body>
</html>
<script src="../../bootstrap-5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/jquery-3.6.3.min.js"></script>
<script src="../assets/js/chart.js"></script>
<script src="../assets/js/use-chart.js"></script>
<script src="../assets/js/scripts.js"></script>