<?php
session_start();
if(isset($_SESSION['username']) && $_SESSION['username'] != "") {
  
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

  <title>Ted Llanes - MP2 | the source | checkout </title>

  <link rel="shortcut icon" href="../assets/images/the-source-favicon-removebg-preview.png" type="image/x-icon">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <link rel="stylesheet" href="../assets/bootstrap-5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/bootstrap-icons.css">   
  <link rel="stylesheet" href="../assets/css/styles.css">
  <link rel="stylesheet" href="../assets/css/media-breakpoints.css">

</head>

<body>

  <?php include ("../inc/header.php"); ?>

  <section class="row container-fluid page-title mt-0">

    <div class="div-overlay-page-title p-3">

      <h1> checkout </h1>

    </div>

  </section>

  <section class="mt-0 py-5" style="background-color: #efefef;">

    <div class="container p-4 rounded" style="background-color: #fff;">   
  
      <div class="row g-5">
        <div class="col-md-5 col-lg-4 order-md-last">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-success">Your cart</span>
            <span class="badge bg-success rounded-pill"><?php echo sizeof($_SESSION['mycart'])?></span>
          </h4>
          <ul class="list-group mb-3">
            <?php
              $sHtml = "";
              foreach ($_SESSION['mycart'] as $key => $v1) {
                $sHtml .= '<li class="list-group-item d-flex justify-content-between lh-sm">
                  <div>
                    <h6 class="my-0">';
                  $sHtml .= $v1['product'];    
                  $sHtml .= '</h6>
                    <small class="text-muted">';
                  $sHtml .=   $v1['qtybuying'];
                  $sHtml .='</small>
                    </div>
                    <span class="text-muted">₱';
                  $sHtml .= $v1['qtybuying'] * $v1['price'];
                  $sHtml .='.00</span>
                </li>
                ';
              }
              echo $sHtml;
            ?>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total</span>
              <strong>₱<?php
                $nTotal = 0;
                  foreach ($_SESSION['mycart'] as $key => $cartProduct)
                  {
                      $nTotal += $cartProduct['qtybuying'] * $cartProduct['price'];
                  } 
                  echo $nTotal;        
                ?>.00
              </strong>
            </li>
          </ul>

<textarea name="orderWithTIN" id="getOrderWithTIN" cols="50" rows="10" style="display:none;">
  <?php
  $aJsonOrder = array();
    foreach ($_SESSION['mycart'] as $product => $productDetails)
    {
      $productDetails += array('tin' => $_SESSION['tn']);
      // print_r($productDetails);
      array_push($aJsonOrder, $productDetails);
    }
    echo json_encode($aJsonOrder);
  ?>
</textarea>
  
          <form class="card p-2">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Promo code">
              <button type="submit" class="btn btn-secondary">Redeem</button>
            </div>
          </form>
        </div>
        <div class="col-md-7 col-lg-8 pe-md-4">
          <h4 class="mb-3">Billing address</h4>
          <form class="needs-validation" novalidate="">
            <div class="row g-3">
              <div class="col-12">
                <label for="fullName" class="form-label">Full name</label>
                <input type="hidden" value="<?php echo $_SESSION['tn']?>">
                <input type="text" class="form-control" id="fullName" placeholder="" value="<?php echo $_SESSION['fname']?>" required="">
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
  
              <div class="col-12">
                <label for="username" class="form-label">Username</label>
                <div class="input-group has-validation">
                  <span class="input-group-text">@</span>
                  <input type="text" class="form-control" id="username" placeholder="Username" required="" value="<?php echo $_SESSION['username']?>">
                <div class="invalid-feedback">
                    Your username is required.
                  </div>
                </div>
              </div>
  
              <div class="col-12">
                <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
                <input type="email" class="form-control" id="email" placeholder="you@example.com" value="<?php echo $_SESSION['email']?>">
                <div class="invalid-feedback">
                  Please enter a valid email address for shipping updates.
                </div>
              </div>
  
              <div class="col-12">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" placeholder="1234 Main St" required="" value="<?php echo $_SESSION['address']?>">
                <div class="invalid-feedback">
                  Please enter your shipping address.
                </div>
              </div>
  
            <hr class="my-4">
  
            <!-- <div class="form-check ps-4">
              <input type="checkbox" class="form-check-input" id="same-address">
              <label class="form-check-label" for="same-address">Shipping address is the same as my billing address</label>
            </div>
  
            <div class="form-check ps-4">
              <input type="checkbox" class="form-check-input" id="save-info">
              <label class="form-check-label" for="save-info">Save this information for next time</label>
            </div>
  
            <hr class="my-4"> -->
  
            <h4 class="mb-3">Payment</h4>
  
            <div class="my-3 ps-4">
              <div class="form-check">
                <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked="" required="" value="Credit Card">
                <label class="form-check-label" for="credit">Credit card</label>
              </div>
              <div class="form-check">
                <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required="" value="Debit Card">
                <label class="form-check-label" for="debit">Debit card</label>
              </div>
              <div class="form-check">
                <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required="" value="PayPal">
                <label class="form-check-label" for="paypal">PayPal</label>
              </div>
            </div>
  
            <!-- <div class="row gy-3">
              <div class="col-md-6">
                <label for="cc-name" class="form-label">Name on card</label>
                <input type="text" class="form-control" id="cc-name" placeholder="" required="">
                <small class="text-muted">Full name as displayed on card</small>
                <div class="invalid-feedback">
                  Name on card is required
                </div>
              </div>
  
              <div class="col-md-6">
                <label for="cc-number" class="form-label">Credit card number</label>
                <input type="text" class="form-control" id="cc-number" placeholder="" required="">
                <div class="invalid-feedback">
                  Credit card number is required
                </div>
              </div>
  
              <div class="col-md-3">
                <label for="cc-expiration" class="form-label">Expiration</label>
                <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
                <div class="invalid-feedback">
                  Expiration date required
                </div>
              </div>
  
              <div class="col-md-3">
                <label for="cc-cvv" class="form-label">CVV</label>
                <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
                <div class="invalid-feedback">
                  Security code required
                </div>
              </div>
            </div> -->
  
            <hr class="my-4">
  
            <button class="w-100 btn btn-primary btn-lg" type="button" id="btnCheckout">Continue to checkout</button>

          </form>

        </div>

      </div>  
    
    </div>

  </section>

  <?php include ("../inc/footer.php"); ?>

</body>

</html>
<script src="../assets/bootstrap-5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/jquery-3.6.3.min.js"></script>
<script src="../assets/js/loading-overlay.min.js"></script>
<script src="../assets/js/scripts.js"></script>
<script src="../assets/js/checkout.js"></script>