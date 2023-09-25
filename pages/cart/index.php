<?php
session_start();

// $sPN = $_POST['productname'];
// $nAQ = $_POST['quantity'];
// $nSQ = 1;
// $nPP = $_POST['price'];
// $img = $_POST['photo'];

// $aProduct = array(
//   'product' => $sPN,
//   'qtyavailable' => $nAQ,
//   'qtybuying' => $nSQ,
//   'price' => $nPP,
//   'image' => $img
// );

// array_push($_SESSION['mycart'], $aProduct); 
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Ted Llanes - MP2 | the source | cart </title>

  <link rel="shortcut icon" href="../assets/images/the-source-favicon-removebg-preview.png" type="image/x-icon">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <link rel="stylesheet" href="../assets/bootstrap-5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/bootstrap-icons.css">   
  <link rel="stylesheet" href="../assets/css/styles.css">
  <link rel="stylesheet" href="../assets/css/media-breakpoints.css">

</head>

<body>

  <!-- <div class="header-toolbar container-fluid">

    <div class="row p-2 container-xl m-auto">

      <div class="col-sm-8">

        <ul class="list-group list-group-flush list-group-horizontal">
          <li class="list-group-item"><a class="dbg" href="#"><i class="fa-solid fa-phone"></i> 09760836551</a></li>
          <li class="list-group-item"><a class="dbg" href="#"><i class="fa-solid fa-envelope"></i> fr3d.1lanes@gmail.com</a></li>
        </ul>

      </div>

      <div class="col-sm-4">

        <ul class="list-group list-group-flush list-group-horizontal d-flex flex-row justify-content-end">
          <li class="list-group-item"><a class="dbg" href="../login/index.html"> login </a></li>
          <li class="list-group-item"><a class="dbg" href=""> |</a></li>
          <li class="list-group-item"><a class="dbg" href="../register/index.html"> register</a></li>
        </ul>

      </div>

    </div>

  </div> -->

  <!-- <header class="sticky-md-top">

    <div class="row p-2 container-xl m-auto">

      <nav class="navbar navbar-expand-lg bg-body-tertiary">      

        <div class="container-fluid">

          <div class="d-flex position-relative logo-container">

            <img class="flex-shrink-0 me-2 logo-img" src="../assets/images/the-source-favicon-removebg-preview.png" width="90px" alt="the source logo">

            <div class="align-self-center">

              <h2 class="logo-name"> <a class="stretched-link" href="../../homepage/index.html"> the source </a> </h2>
              <p class="logo-slogan"> everyting fresh </p>
            
            </div>

          </div>
  
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

              <li class="nav-item ms-3">
                <a class="nav-link active" aria-current="page" href="../../homepage/index.html"> home </a>
              </li>

              <li class="nav-item ms-3">
                <a class="nav-link" href="../who-are-we/index.html"> who are we </a>
              </li>

              <li class="nav-item ms-3">
                <a class="nav-link" href="../goods-near-you/index.html"> goods near you </a>
              </li>

              <li class="nav-item ms-3 dropdown">
                <a class="nav-link dropdown-toggle" href="../positive-impact/index.html" role="button" data-bs-toggle="dropdown" aria-expanded="false"> positive impact </a>

                <ul class="dropdown-menu">

                  <li><a class="dropdown-item" href="../positive-impact/reviews/index.html"> reviews </a></li>

                  <li><a class="dropdown-item" href="../positive-impact/blogs/index.html"> blogs </a></li>

                  <li><a class="dropdown-item" href="../positive-impact/vlogs/index.html"> vlogs </a></li>

                </ul>

              </li>

              <li class="nav-item ms-3">
                <button class="nav-link btn btn-primary ps-3 pe-3" onclick="document.location='../contact-us/index.html'"> contact us </button>
              </li>

            </ul>

          </div>

        </div>        

      </nav>
  
    </div> 

  </header> -->

  <?php include ("../inc/header.php"); ?>

  <section class="row container-fluid page-title mt-0">

    <div class="div-overlay-page-title p-3">

      <h1>cart </h1>

    </div>

  </section>

  <section class="mt-0 py-5" style="background-color: #efefef;">

    <div class="container">

      <div class="row d-flex justify-content-center align-items-center">

        <div class="col p-3 p-sm-0">

          <p class="mb-4"><span class="h2">Shopping Cart </span><span class="h4">(<?php echo sizeof($_SESSION['mycart'])?> items in your cart)</span></p>

          <?php
          $sHtml = "";

          foreach ($_SESSION['mycart'] as $key => $v1) {
      
                  $sHtml .= '  <section class="card mt-2 mb-4">
      
                    <div class="card-body p-4">
          
                      <div class="row align-items-center">
      
                        <div class="col-md-2 pe-md-3">
                          <img src="';
                  $sHtml .= "../" . $v1['image'];
                  $sHtml .= '"
                            class="img-fluid" alt="';
                  $sHtml .= $v1['product'];
                  $sHtml .= '" style="width: 100px; height: 100px; object-fit: cover; object-position: 25% 25%;">
                        </div>
      
                        <div class="col-6 col-sm-4 col-md-2 d-flex justify-content-center">
                          <div class="w-100">
                            <p class="small text-muted mt-3 mt-md-0 mb-0 mb-md-4 pb-2"> Name </p>
                            <p class="lead fw-normal mb-0">';
                  $sHtml .= $v1['product'];
                  $sHtml .= '</p>
                          </div>
                        </div>
      
                        <div class="col-6 col-sm-4 col-md-2 d-flex justify-content-center">
                          <div class="w-100">
                            <p class="small text-muted mt-3 mt-md-0 mb-0 mb-md-4 pb-2"> Available in kilos</p>
                            <p class="lead fw-normal mb-0 nAvailable';
                  $sHtml .= $key;          
                  $sHtml .= '">';
                  $sHtml .= $v1['qtyavailable'];
                  $sHtml .= '</p>
                          </div>
                        </div>
      
                        <div class="col-12 col-sm-4 col-md-2 d-flex justify-content-center">
                          <div class="w-100">
                            <p class="small text-muted mt-3 mt-md-0 mb-0 mb-md-4 pb-2"> Quantity in kilos </p>
                            <input type="number" class="lead fw-normal mb-0 quantity" min="1" max="';
                  $sHtml .= $v1['qtyavailable'];          
                  $sHtml .='" value="';
                  $sHtml .= $v1['qtybuying'];          
                  $sHtml .='" step="1" id="qty';
                  $sHtml .= $key;
                  $sHtml .='" style="padding: 2px 7px !important;" onchange="changeQty(';
                  $sHtml .=   "'" . $key . "'";
                  $sHtml .=')">
                          </div>
                        </div>
      
                        <div class="col-6 col-md-2 d-flex justify-content-center">
                          <div class="w-100">
                            <p class="small text-muted mt-3 mt-md-0 mb-0 mb-md-4 pb-2"> Price per kilo </p>
                            <p class="lead fw-normal mb-0 price"> ₱';
                  $sHtml .= $v1['price']; 
                  $sHtml .= '.00 </p>
                          </div>
                        </div>
      
                        <div class="col-6 col-md-2 d-flex justify-content-center">
                          <div class="w-100">
                            <p class="small text-muted mt-3 mt-md-0 mb-0 mb-md-4 pb-2">Sub Total</p>
                            <p class="lead fw-normal mb-0 sub-total"> ₱';
                  $sHtml .= $v1['qtybuying'] * $v1['price'];          
                  $sHtml .= '.00 </p>
                          </div>
                        </div>
      
                      </div>
          
                    </div>
                    <button type="button" class="position-absolute top-25 start-100 translate-middle p-2 bg-danger border border-light rounded-circle text-white" style="font-size: 14px; line-height: 1em; font-family: monospace; padding: 5px 8px !important;" onclick="delToCart(';
                  $sHtml .=   "'" . $key . "'";
                  $sHtml .=  ', this)">x<span class="visually-hidden">close</span>
                    </button>
                  </section>
                  ';
                
              }
      
              echo $sHtml;
          
          ?>

          <!-- <div id="div-cart"></div> -->
  
          <!-- <div class="card mb-4">

            <div class="card-body p-4">
  
              <div class="row align-items-center">

                <div class="col-md-2 pe-md-3">
                  <img src="../assets/images/jonathan-pielmayer-eFFnKMiDMGc-unsplash.jpg"
                    class="img-fluid" alt="Generic placeholder image">
                </div>

                <div class="col-6 col-sm-4 col-md-2 d-flex justify-content-center">
                  <div class="w-100">
                    <p class="small text-muted mt-3 mt-md-0 mb-0 mb-md-4 pb-2"> Name </p>
                    <p class="lead fw-normal mb-0"> Vegetable </p>
                  </div>
                </div>

                <div class="col-6 col-sm-4 col-md-2 d-flex justify-content-center">
                  <div class="w-100">
                    <p class="small text-muted mt-3 mt-md-0 mb-0 mb-md-4 pb-2"> Available in kilos</p>
                    <p class="lead fw-normal mb-0"> 15 </p>
                  </div>
                </div>

                <div class="col-12 col-sm-4 col-md-2 d-flex justify-content-center">
                  <div class="w-100">
                    <p class="small text-muted mt-3 mt-md-0 mb-0 mb-md-4 pb-2"> Quantity in kilos </p>
                    <p class="lead fw-normal mb-0"> 1/2 </p>
                  </div>
                </div>

                <div class="col-6 col-md-2 d-flex justify-content-center">
                  <div class="w-100">
                    <p class="small text-muted mt-3 mt-md-0 mb-0 mb-md-4 pb-2"> Price per kilo </p>
                    <p class="lead fw-normal mb-0"> ₱80.00 </p>
                  </div>
                </div>

                <div class="col-6 col-md-2 d-flex justify-content-center">
                  <div class="w-100">
                    <p class="small text-muted mt-3 mt-md-0 mb-0 mb-md-4 pb-2">Total</p>
                    <p class="lead fw-normal mb-0"> ₱40.00 </p>
                  </div>
                </div>

              </div>
  
            </div>

          </div> -->

          <!-- <div class="card mb-4">

            <div class="card-body p-4">
  
              <div class="row align-items-center">

                <div class="col-md-2 pe-md-3">
                  <img src="../assets/images/mathias-katz-i2O8WrB14g0-unsplash.jpg"
                    class="img-fluid" alt="Generic placeholder image">
                </div>

                <div class="col-6 col-sm-4 col-md-2 d-flex justify-content-center">
                  <div class="w-100">
                    <p class="small text-muted mt-3 mt-md-0 mb-0 mb-md-4 pb-2"> Name </p>
                    <p class="lead fw-normal mb-0"> Fruit </p>
                  </div>
                </div>

                <div class="col-6 col-sm-4 col-md-2 d-flex justify-content-center">
                  <div class="w-100">
                    <p class="small text-muted mt-3 mt-md-0 mb-0 mb-md-4 pb-2"> Available in kilos</p>
                    <p class="lead fw-normal mb-0"> 20 </p>
                  </div>
                </div>

                <div class="col-12 col-sm-4 col-md-2 d-flex justify-content-center">
                  <div class="w-100">
                    <p class="small text-muted mt-3 mt-md-0 mb-0 mb-md-4 pb-2"> Quantity in kilos </p>
                    <p class="lead fw-normal mb-0"> 2 1/2 </p>
                  </div>
                </div>

                <div class="col-6 col-md-2 d-flex justify-content-center">
                  <div class="w-100">
                    <p class="small text-muted mt-3 mt-md-0 mb-0 mb-md-4 pb-2"> Price per kilo </p>
                    <p class="lead fw-normal mb-0"> ₱160.00 </p>
                  </div>
                </div>

                <div class="col-6 col-md-2 d-flex justify-content-center">
                  <div class="w-100">
                    <p class="small text-muted mt-3 mt-md-0 mb-0 mb-md-4 pb-2">Total</p>
                    <p class="lead fw-normal mb-0"> ₱400.00 </p>
                  </div>
                </div>

              </div>
  
            </div>

          </div>

          <div class="card mb-4">

            <div class="card-body p-4">
  
              <div class="row align-items-center">

                <div class="col-md-2 pe-md-3">
                  <img src="../assets/images/paras-kapoor-obrAaJAFXuw-unsplash.jpg"
                    class="img-fluid" alt="Generic placeholder image">
                </div>

                <div class="col-6 col-sm-4 col-md-2 d-flex justify-content-center">
                  <div class="w-100">
                    <p class="small text-muted mt-3 mt-md-0 mb-0 mb-md-4 pb-2"> Name </p>
                    <p class="lead fw-normal mb-0"> Meat </p>
                  </div>
                </div>

                <div class="col-6 col-sm-4 col-md-2 d-flex justify-content-center">
                  <div class="w-100">
                    <p class="small text-muted mt-3 mt-md-0 mb-0 mb-md-4 pb-2"> Available in kilos</p>
                    <p class="lead fw-normal mb-0"> 50 </p>
                  </div>
                </div>

                <div class="col-12 col-sm-4 col-md-2 d-flex justify-content-center">
                  <div class="w-100">
                    <p class="small text-muted mt-3 mt-md-0 mb-0 mb-md-4 pb-2"> Quantity in kilos </p>
                    <p class="lead fw-normal mb-0"> 2 </p>
                  </div>
                </div>

                <div class="col-6 col-md-2 d-flex justify-content-center">
                  <div class="w-100">
                    <p class="small text-muted mt-3 mt-md-0 mb-0 mb-md-4 pb-2"> Price per kilo </p>
                    <p class="lead fw-normal mb-0"> ₱180.00 </p>
                  </div>
                </div>

                <div class="col-6 col-md-2 d-flex justify-content-center">
                  <div class="w-100">
                    <p class="small text-muted mt-3 mt-md-0 mb-0 mb-md-4 pb-2">Total</p>
                    <p class="lead fw-normal mb-0"> ₱360.00 </p>
                  </div>
                </div>

              </div>
  
            </div>

          </div> -->
  
          <div class="card mb-5">

            <div class="card-body p-4">
  
              <div class="float-end">
                <p class="mb-0 me-5 d-flex align-items-center">
                  <span class="small text-muted me-2">Order total:</span> <span
                    class="lead fw-normal total"> ₱<?php
          $nTotal = 0;
            foreach ($_SESSION['mycart'] as $key => $cartProduct)
            {
                $nTotal += $cartProduct['qtybuying'] * $cartProduct['price'];
            } 
            echo $nTotal;        
          ?>.00 </span>
                </p>
              </div>
  
            </div>
          </div>
  
          <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-light btn-lg me-2" onclick="document.location='../goods-near-you/'">Continue shopping</button>
            <button type="button" class="btn btn-primary btn-lg" onclick="document.location='../checkout/'"> Checkout </button>
          </div>
  
        </div>

      </div>

    </div>

  </section>

  <?php include ("../inc/footer.php"); ?>

  <!-- <footer class="row">

    <div class="container p-3 footer-top">

      <div class="container-lg">

        <div class="row justify-content-center">
  
          <div class="col-md-6">
            <h3>newsletter</h3>
            <p>receive fresh from <b>the source</b></p>
          </div>
    
          <div class="col-sm-6 d-flex justify-content-end align-self-center newsletter-form">
            <input class="me-sm-2" type="email" name="email" id="sup-email" placeholder="enter your email">
            <button class="btn btn-outline-primary">sign up</button>
          </div>
  
        </div>
  
      </div>

    </div>

    <div class="container p-3 footer-info">

      <div class="container-lg">

        <div class="row">

          <div class="col-lg-6 pe-lg-5">

            <h2> the source </h2>
            <h3 class="mb-4"> everything fresh </h3>
            <p class="mb-5"> at "the source", we strive to help you achieve your goals in a more efficient manner by minimizing the time and distance needed to acquire the items you desire. by doing so, you can access fresh, high-quality goods at a lower cost, all while supporting the well-being of our planet. our aim is not only to benefit consumers and retailers, but, most importantly, to encourage and empower local producers such as homegrowers and small-scale fisherman. </p>

          </div>

          <div class="col-sm-3 d-flex flex-column text-center p-lg-3 mb-4 quick-links">

            <h4 class="mb-4">quick links</h4>
            
            <a class="dbg mb-2" href="../goods-near-you/index.html"> goods near you </a>
            <a class="dbg mb-2" href="../my-account/index.html"> my account </a>
            <a class="dbg mb-2" href="../my-store/index.html"> my store </a>
            <a class="dbg mb-2" href="../positive-impact/index.html"> positive impact </a>
            <a class="dbg mb-2" href="../contact-us/index.html"> contact us </a>

          </div>

          <div class="col-sm-3 d-flex flex-column text-end p-lg-3">

            <h4 class="mb-4">contact info</h4>

            <a class="dbg mb-2" href="mailto:fr3d.1laness@gmail.com"> fr3d.1lanes@gmail.com <i class="fa-solid fa-envelope"></i></a>
            <a class="dbg mb-2" href="tel:+639760836551"> (+63) 976-083-6551 <i class="fa-solid fa-mobile-screen"></i></a>
            
            <div class="col d-flex flex-row">

              <div class="col align-self-end mt-5 socials">

                <i class="fa-brands fa-square-facebook"></i>
                <i class="fa-brands fa-square-twitter"></i>
                <i class="fa-brands fa-square-instagram"></i>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

    <div class="container p-3 footer-bottom">

      <div class="container-lg">

        <div class="row">
  
          <div class="col-sm-6 d-flex justify-content-start align-self-center">
            <a class="dbg" href="../sitemap/index.html">sitemap</a> <span class="ps-1 pe-1"> | </span> <a class="dbg" href="../privacy-policy/index.html">privacy policy</a>
          </div>
    
          <div class="col-sm-6 d-flex justify-content-end align-self-center">
            <div>© <span id="copyright-year"></span> <big><b>the source</b></big></div>
          </div>
  
        </div>
  
      </div>

    </div>

  </footer> -->

</body>

</html>
<script src="../assets/bootstrap-5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/jquery-3.6.3.min.js"></script>
<script src="../assets/js/loading-overlay.min.js"></script>
<script src="../assets/js/scripts.js"></script>
<script src="../assets/js/addtocart.js"></script>