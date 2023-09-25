<?php
session_start();
$sPage = 'goods near you';
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Ted Llanes - MP2 | the source | goods near you </title>

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

  </div>

  <header class="sticky-md-top">

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
                <a class="nav-link" aria-current="page" href="../../homepage/index.html"> home </a>
              </li>

              <li class="nav-item ms-3">
                <a class="nav-link" href="../who-are-we/index.html"> who are we </a>
              </li>

              <li class="nav-item ms-3">
                <a class="nav-link active" href="../goods-near-you/index.html"> goods near you </a>
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

      <h1> goods near you </h1>

    </div>

  </section>
    
  <section>

    <h2 style="text-align: center;">fresh from <b>the source</b></h2>

  </section>

  <!-- <section id="search">

    <form class="container ms-auto me-auto d-flex flex-column p-4 mb-5">

      <div class="row">
  
        <div class="col-sm-6 col-md-3 d-flex flex-column pe-sm-2">
  
          <label for="radius">Radius:</label>
          <select id="radius" name="radius" class="mb-2 mb-sm-0" style="height: 3rem;">
            <option value="1">1 km</option>
            <option value="2">2 km</option>
            <option value="5">5 km</option>
            <option value="10">10 km</option>
          </select>
  
        </div>
  
        <div class="col-sm-6 col-md-3 d-flex flex-column pe-md-2">
  
          <label for="product-group">Product Group:</label>
          <select id="product-group" name="product-group" class="mb-2 mb-sm-0" style="height: 3rem;">
            <option value="fruits">Fruits</option>
            <option value="vegetables">Vegetables</option>
            <option value="meat">Meat</option>
            <option value="fish">Fish</option>
          </select>
  
        </div>
  
        <div class="col-sm-6 col-md-3 d-flex flex-column pe-sm-2">
  
          <label for="product">Product:</label>
          <input type="text" id="product" name="product" class="mb-4 mb-sm-0" style="height: 3rem;">
  
        </div>
        
        <div class="col-sm-6 col-md-3 d-flex flex-column align-self-end">
  
          <input type="submit" value="Filter" class="mb-2 mb-sm-0" style="height: 3rem;">
  
        </div>

      </div>      

    </form>

  </section> -->

  <section class="row container-fluid section-for-consumer">
    
    <div class="container-lg div-for-consumer">
      
      <div class="container-lg mt-5">

        <h2>your location</h2>
        <h3>the best prices near you</h3>

      </div>      
  
      <div class="container-lg mt-4 mb-5">
        <div class="row justify-content-center ps-sm-4 pe-sm-4 g-1" id="product-list">

            <!-- <div class="col-md-4 p-2">
                <div class="p-card">
                    <div class="p-carousel">
                        <div class="carousel slide carousel-fade" data-bs-ride="carousel" id="carousel-2-1">
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item img-container active" style="background-image: url('../assets/images/engin-akyurt-Y5n8mCpvlZU-unsplash.jpg');"></div>
                                <div class="carousel-item img-container" style="background-image: url('../assets/images/anna-pelzer-IGfIGP5ONV0-unsplash.jpg');"></div>
                                <div class="carousel-item img-container" style="background-image: url('../assets/images/scott-warman-NpNvI4ilT4A-unsplash.jpg');"></div>
                            </div>
                        </div>
                    </div>
                    <div class="p-details p-2">
                        <div class="d-flex justify-content-between align-items-center mx-2">
                            <h5>a fruit/vegetable</h5><span>SRP: ₱10.00</span></div>
                        <div class="mx-2">
                            <hr class="line">
                        </div>
                        <div class="d-flex justify-content-between mt-2 spec mx-2">
                            <div class="d-flex flex-column align-items-center">
                                <h6 class="mb-0">lowest</h6><span>₱8.50</span></div>
                            <div class="d-flex flex-column align-items-center">
                                <h6 class="mb-0">average</h6><span>₱10.75</span></div>
                        </div>
                        <div class="mx-2">
                          <hr class="line">
                        </div>
                        <div class="d-flex justify-content-around mt-2 spec mx-2">
                            <div class="d-flex flex-column align-items-center">
                                <h6 class="mb-0">BEST PRICE NEAR YOU</h6><span>₱11.00</span></div>
                        </div>

                        <div class="buy mt-3"><button class="btn btn-primary" type="button" onclick="document.location='../cart/index.html'">buy</button></div>
                        
                    </div>
                </div>
            </div>
  
            <div class="col-md-4 p-2">
                <div class="p-card">
                    <div class="p-carousel">
                        <div class="carousel slide carousel-fade" data-bs-ride="carousel" id="carousel-2-2">
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item img-container active" style="background-image: url('../assets/images/eiliv-aceron-YlAmh_X_SsE-unsplash.jpg');"></div>
                                <div class="carousel-item img-container" style="background-image: url('../assets/images/paras-kapoor-obrAaJAFXuw-unsplash.jpg');"></div>
                                <div class="carousel-item img-container" style="background-image: url('../assets/images/jeremy-stewart-BvXUtQhTQzk-unsplash.jpg');"></div>
                            </div>
                        </div>
                    </div>
                    <div class="p-details p-2">
                        <div class="d-flex justify-content-between align-items-center mx-2">
                            <h5>a meat</h5><span>SRP: ₱150.00/kilo</span></div>
                        <div class="mx-2">
                            <hr class="line">
                        </div>
                        <div class="d-flex justify-content-between mt-2 spec mx-2">
                            <div class="d-flex flex-column align-items-center">
                                <h6 class="mb-0">lowest</h6><span>₱120.00/kilo</span></div>
                            <div class="d-flex flex-column align-items-center">
                                <h6 class="mb-0">average</h6><span>₱152.70/kilo</span></div>
                        </div>
                        <div class="mx-2">
                          <hr class="line">
                        </div>
                        <div class="d-flex justify-content-around mt-2 spec mx-2">
                            <div class="d-flex flex-column align-items-center">
                                <h6 class="mb-0">BEST PRICE NEAR YOU</h6><span>₱155.00/kilo</span></div>
                        </div>

                        <div class="buy mt-3"><button class="btn btn-primary" type="button" onclick="document.location='../cart/index.html'">buy</button></div>

                    </div>
                </div>
            </div>
  
            <div class="col-md-4 p-2">
                <div class="p-card">
                    <div class="p-carousel">
                        <div class="carousel slide carousel-fade" data-bs-ride="carousel" id="carousel-2-3">
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item img-container active" style="background-image: url('../assets/images/jacopo-maia--gOUx23DNks-unsplash.jpg');"></div>
                                <div class="carousel-item img-container" style="background-image: url('../assets/images/nrd-D6Tu_L3chLE-unsplash.jpg');"></div>
                                <div class="carousel-item img-container" style="background-image: url('../assets/images/scott-warman-NpNvI4ilT4A-unsplash.jpg');"></div>
                            </div>
                        </div>
                    </div>
                    <div class="p-details p-2">
                        <div class="d-flex justify-content-between align-items-center mx-2">
                            <h5>an ingredient</h5><span>SRP: ₱40.00</span></div>
                        <div class="mx-2">
                            <hr class="line">
                        </div>
                        <div class="d-flex justify-content-between mt-2 spec mx-2">
                            <div class="d-flex flex-column align-items-center">
                                <h6 class="mb-0">lowest</h6><span>₱40.00</span></div>
                            <div class="d-flex flex-column align-items-center">
                                <h6 class="mb-0">average</h6><span>₱43.20</span></div>
                        </div>
                        <div class="mx-2">
                          <hr class="line">
                        </div>
                        <div class="d-flex justify-content-around mt-2 spec mx-2">
                            <div class="d-flex flex-column align-items-center">
                                <h6 class="mb-0">BEST PRICE NEAR YOU</h6><span>₱35.00</span></div>
                        </div>

                        <div class="buy mt-3"><button class="btn btn-primary" type="button" onclick="document.location='../cart/index.html'">buy</button></div>

                    </div>
                </div>
            </div> -->
  
        </div>
      </div>
  
    </div>

  </section>

  <section class="row container-fluid section-retailer">
    
    <div class="container-lg div-retailer">
      
      <div class="container-lg">

        <h2>top retailers</h2>
        <h3>in your neighborhood</h3>

      </div>      
  
      <div class="container-lg mt-4 mb-5">

        <div class="row justify-content-center ps-sm-4 pe-sm-4 g-1">

          <div class="col-md-4 p-2">
              <div class="p-card">
                  <div class="p-carousel">
                      <div class="carousel slide carousel-fade" data-bs-ride="" id="carousel-2-1">
                          <div class="carousel-inner" role="listbox">
                              <div class="carousel-item img-container active" style="background-image: url('../assets/images/jacopo-maia--gOUx23DNks-unsplash.jpg');"></div>
                          </div>
                      </div>
                  </div>
                  <div class="p-details p-2">
                      <div class="d-flex justify-content-between align-items-center mx-2">
                          <h5>top retailer #1</h5><span>ratings: 8/10</span></div>
                      <div class="mx-2">
                          <hr class="line">
                      </div>
                      <div class="d-flex justify-content-between mt-2 spec mx-2">
                          <div class="d-flex flex-column align-items-center">
                              <h6 class="mb-0">main produce</h6><span> fruits </span></div>
                          <div class="d-flex flex-column align-items-center">
                              <h6 class="mb-0">ave. vs srp</h6><span>100%</span></div>
                      </div>
                      <div class="mx-2">
                        <hr class="line">
                      </div>
                      <div class="d-flex justify-content-around mt-2 spec mx-2">
                          <div class="d-flex flex-column align-items-center">
                              <h6 class="mb-0">SALES TRAFFIC</h6><span>high</span></div>
                      </div>
                      <div class="buy mt-3"><button class="btn btn-primary" type="button" onclick="document.location='#'">check store</button></div>
                  </div>
              </div>
          </div>

          <div class="col-md-4 p-2">
            <div class="p-card">
                <div class="p-carousel">
                    <div class="carousel slide carousel-fade" data-bs-ride="" id="carousel-2-1">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item img-container active" style="background-image: url('../assets/images/john-cameron-6-5Ul3I6vSE-unsplash.jpg');"></div>
                        </div>
                    </div>
                </div>
                <div class="p-details p-2">
                    <div class="d-flex justify-content-between align-items-center mx-2">
                        <h5>top retailer #2</h5><span>ratings: 7.5/10</span></div>
                    <div class="mx-2">
                        <hr class="line">
                    </div>
                    <div class="d-flex justify-content-between mt-2 spec mx-2">
                        <div class="d-flex flex-column align-items-center">
                            <h6 class="mb-0">main produce</h6><span> meat </span></div>
                        <div class="d-flex flex-column align-items-center">
                            <h6 class="mb-0">ave. vs srp</h6><span>110%</span></div>
                    </div>
                    <div class="mx-2">
                      <hr class="line">
                    </div>
                    <div class="d-flex justify-content-around mt-2 spec mx-2">
                        <div class="d-flex flex-column align-items-center">
                            <h6 class="mb-0">SALES TRAFFIC</h6><span>med</span></div>
                    </div>
                    <div class="buy mt-3"><button class="btn btn-primary" type="button" onclick="document.location='#'">check store</button></div>
                </div>
            </div>
          </div>

          <div class="col-md-4 p-2">
              <div class="p-card">
                  <div class="p-carousel">
                      <div class="carousel slide carousel-fade" data-bs-ride="" id="carousel-2-1">
                          <div class="carousel-inner" role="listbox">
                              <div class="carousel-item img-container active" style="background-image: url('../assets/images/megan-thomas-xMh_ww8HN_Q-unsplash.jpg');"></div>
                          </div>
                      </div>
                  </div>
                  <div class="p-details p-2">
                      <div class="d-flex justify-content-between align-items-center mx-2">
                          <h5>top retailer #3</h5><span>ratings: 7.5/10</span></div>
                      <div class="mx-2">
                          <hr class="line">
                      </div>
                      <div class="d-flex justify-content-between mt-2 spec mx-2">
                          <div class="d-flex flex-column align-items-center">
                              <h6 class="mb-0">main produce</h6><span> veggies </span></div>
                          <div class="d-flex flex-column align-items-center">
                              <h6 class="mb-0">ave. vs srp</h6><span>95%</span></div>
                      </div>
                      <div class="mx-2">
                        <hr class="line">
                      </div>
                      <div class="d-flex justify-content-around mt-2 spec mx-2">
                          <div class="d-flex flex-column align-items-center">
                              <h6 class="mb-0">SALES TRAFFIC</h6><span>high</span></div>
                      </div>
                      <div class="buy mt-3"><button class="btn btn-primary" type="button" onclick="document.location='#'">check store</button></div>
                  </div>
              </div>
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
<script src="../assets/js/showproducts.js"></script>
<script src="../assets/js/addtocart.js"></script>