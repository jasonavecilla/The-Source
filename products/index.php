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

    $sPage = 'products';
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Products</title>

    <link rel="shortcut icon" href="../assets/images/the-source-favicon-removebg-preview.png" type="image/x-icon">

    <link rel="stylesheet" href="../../bootstrap-5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/confirm-delete.css">

</head>
<body id="body-pd">
<?php include ("../admin/includes/header.php"); ?>

    <!--Container Main start-->
    <div class="height-100 bg-white">

        <div class="container d-flex flex-row flex-wrap">

            <div class="col-12 py-4 d-flex flex-column">

                <div class=""><h4 id="scsUmsg"></h4></div>

                <table class="table table-striped shadow">
                    <thead class="bg-success text-light">
                        <tr>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Code</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th></th>
                        </tr>
                    </thead>

                    <tbody id="productlist">

                        <!-- <tr>
                        <td>image</td>
                        <td>product</td>
                        <td>code</td>
                        <td>description</td>
                        <td>quantity</td>
                        <td>price</td>
                        <td>update/remove</td>
                        </tr> -->

                    </tbody>

                </table>

                <a href="add-new-product" class="btn btn-success align-self-end" type="button" id="addNewProduct">Add New Product</a>

            </div>
            
            <div class="d-flex flex-row justify-content-end mt-4 position-fixed bottom-0 end-0">              
                <button class="btn btn-outline-secondary btn-sm m-2" type="button" style="display:<?php echo $is_level1 = ($sUserLevel == 'lvl1' || $sUserLevel == 'lvl2') ? 'none' : false; ?>;" id="btn-scpr">Send CSV Product Report</button>
                <button class="btn btn-outline-secondary btn-sm m-2" type="button" style="display:<?php echo $is_level1 = ($sUserLevel == 'lvl1' || $sUserLevel == 'lvl2') ? 'none' : false; ?>;" id="btn-sppr">Send PDF Product Report</button>
            </div>

        </div>
    
    </div>
    <!--Container Main end-->

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#popSendEmails" style="display:none;">
  Launch Emails CSV Form
</button>

<!-- Modal -->
<div class="modal fade" id="popSendEmails" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Provide Emails for Recipients</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">

      <div class="container d-flex flex-row">

<div class="col-12 p-2">
        
    
            <label for="rEmails">Recipient Emails<br/>(separate multiple emails with a comma)</label>
            <textarea class="w-100" name="rEmails" id="rEmails" cols="" rows="3"></textarea>

            <label for="ccEmails">Add CC Emails<br/>(separate multiple emails with a comma)</label>
            <textarea class="w-100" name="ccEmails" id="ccEmails" cols="" rows="3"></textarea>

            <label for="bccEmails">Add BCC Emails<br/>(separate multiple emails with a comma)</label>
            <textarea class="w-100" name="bccEmails" id="bccEmails" cols="" rows="3"></textarea>
       

</div>

</div>
        
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="btnSendR">Send CSV Report</button>
      </div>
    </div>
  </div>
</div>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#popSendEmailsP" style="display:none;">
  Launch Emails PDF Form
</button>

<!-- Modal -->
<div class="modal fade" id="popSendEmailsP" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Provide Emails for Recipients</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">

      <div class="container d-flex flex-row">

<div class="col-12 p-2">
        
    
            <label for="rEmailsP">Recipient Emails<br/>(separate multiple emails with a comma)</label>
            <textarea class="w-100" name="rEmailsP" id="rEmailsP" cols="" rows="3"></textarea>

            <label for="ccEmailsP">Add CC Emails<br/>(separate multiple emails with a comma)</label>
            <textarea class="w-100" name="ccEmailsP" id="ccEmailsP" cols="" rows="3"></textarea>

            <label for="bccEmailsP">Add BCC Emails<br/>(separate multiple emails with a comma)</label>
            <textarea class="w-100" name="bccEmailsP" id="bccEmailsP" cols="" rows="3"></textarea>
       

</div>

</div>
        
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="btnSendRP">Send PDF Report</button>
      </div>
    </div>
  </div>
</div>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#delCon" style="display:none;">
  Open Delete Confirmation
</button>

<!-- Modal -->
<div class="modal fade" id="delCon" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">

        <div class="container d-flex flex-row p-0">

          <div class="col-12 p-2">          
    
              <div class="container">
                <h1>Remove Product</h1>
                <p>Are you sure you want to remove<br/> <b><span id="sProductDel"></span></b> product?</p>
                <input type="hidden" id="nProductId">
              
                <div class="clearfix">
                  <button type="button" onclick='$("#delCon").modal("hide");' class="cancelbtn">Cancel</button>
                  <button type="button" id="btnProceedDelete" class="deletebtn">Remove</button>
                </div>
              </div>

          </div>

        </div>

      </div>
      
    </div>        

  </div>

</div>
    
</body>
</html>
<script src="../../bootstrap-5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/jquery-3.6.3.min.js"></script>
<script src="../assets/js/loading-overlay.min.js"></script>
<script src="../assets/js/scripts.js"></script>
<script src="js/fetch.js"></script>
<script src="js/sendproductreport.js"></script>