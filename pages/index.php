<?php
session_start();
$sPage = 'home';
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Ted Llanes - MP2 | the source</title>

  <link rel="shortcut icon" href="assets/images/the-source-favicon-removebg-preview.png" type="image/x-icon">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <link rel="stylesheet" href="assets/bootstrap-5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/bootstrap-icons.css">   
  <link rel="stylesheet" href="assets/css/styles.css">
  <link rel="stylesheet" href="assets/css/media-breakpoints.css">

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
          <li class="list-group-item"><a class="dbg" href="../homepage/login/index.html"> login </a></li>
          <li class="list-group-item"><a class="dbg" href=""> |</a></li>
          <li class="list-group-item"><a class="dbg" href="../homepage/register/index.html"> register</a></li>
        </ul>

      </div>

    </div>

  </div>

  <header class="sticky-md-top">

    <div class="row p-2 container-xl m-auto">

      <nav class="navbar navbar-expand-lg bg-body-tertiary">      

        <div class="container-fluid">

          <div class="d-flex position-relative logo-container">

            <img class="flex-shrink-0 me-2 logo-img" src="assets/images/the-source-favicon-removebg-preview.png" width="90px" alt="the source logo">

            <div class="align-self-center">

              <h2 class="logo-name"> <a class="stretched-link" href="../homepage/index.html"> the source </a> </h2>
              <p class="logo-slogan"> everyting fresh </p>
            
            </div>

          </div>
  
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

              <li class="nav-item ms-3">
                <a class="nav-link active" aria-current="page" href="../homepage/index.html"> home </a>
              </li>

              <li class="nav-item ms-3">
                <a class="nav-link" href="who-are-we/index.html"> who are we </a>
              </li>

              <li class="nav-item ms-3">
                <a class="nav-link" href="goods-near-you/index.html"> goods near you </a>
              </li>

              <li class="nav-item ms-3 dropdown">
                <a class="nav-link dropdown-toggle" href="positive-impact/index.html" role="button" data-bs-toggle="dropdown" aria-expanded="false"> positive impact </a>

                <ul class="dropdown-menu">

                  <li><a class="dropdown-item" href="positive-impact/reviews/index.html"> reviews </a></li>

                  <li><a class="dropdown-item" href="positive-impact/blogs/index.html"> blogs </a></li>

                  <li><a class="dropdown-item" href="positive-impact/vlogs/index.html"> vlogs </a></li>

                </ul>

              </li>

              <li class="nav-item ms-3">
                <button class="nav-link btn btn-primary ps-3 pe-3" onclick="document.location='contact-us/index.html'"> contact us </button>
              </li>

            </ul>

          </div>

        </div>        

      </nav>
  
    </div> 

  </header> -->

  <?php include ("inc/header.php"); ?>
    
  <hero id="myCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">

    <div class="carousel-inner" style="background-color: black;">

        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>

        <div class="carousel-item active" data-bs-interval="6000" style="background-image: url('assets/images/engin-akyurt-Y5n8mCpvlZU-unsplash.jpg'); background-position: center;background-size: cover; width: 100vw; height: 700px;">
            
            <div class="div-overlay">

                <div class="div-carousel-content animate pop">

                    <h2> Are you a small time retailer? </h2>
                    <p>that is often bothered by high perishable commodities in your inventory.</p>
                    <h3>register your store with us and share your inventory to millions of our members... </h3>
                    <button type="button" class="btn btn-outline-light" onclick="document.location='who-are-we/#retailer'">Learn More</button>

                </div>
                
            </div>
            
        </div>

        <div class="carousel-item" data-bs-interval="6000" style="background-image: url('assets/images/paras-kapoor-obrAaJAFXuw-unsplash.jpg'); background-position: center;background-size: cover; width: 100vw; height: 700px;">
            
            <div class="div-overlay">

                <div class="div-carousel-content animate pop">

                    <h2> Are you craving for something fresh? </h2>
                    <p>but is worried for the cost and availability of it in your neighborhood.</p>
                    <h3>become a member and find your cravings at the lowest price possible that is nearest around you...</h3>
                    <button type="button" class="btn btn-outline-light" onclick="document.location='who-are-we/#consumer'">Learn More</button>

                </div>
                
            </div>
            
        </div>

        <div class="carousel-item" data-bs-interval="6000" style="background-image: url('assets/images/jeremy-stewart-BvXUtQhTQzk-unsplash.jpg'); background-position: center;background-size: cover; width: 100vw; height: 700px;">
            
            <div class="div-overlay">

                <div class="div-carousel-content animate pop">

                    <h2> Are you a local producer or a fisherman? </h2>
                    <p>wanting to sell your goods but have no proper distribution channel and have no extra time in your hand.</p>
                    <h3>be <b>the source</b> and present your goods to millions of our members...</h3>
                    <button type="button" class="btn btn-outline-light" onclick="document.location='who-are-we/#producer'">Learn More</button>

                </div>
                
            </div>
        
      </div>

    </div>

      <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>

      <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>

  </hero>

  <section class="row container-xl ms-auto me-auto ps-3 pe-3">

    <div class="col-md-6">

      <div id="carousel-2" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="assets/images/hanson-lu-sq5P00L7lXc-unsplash.jpg" class="d-block w-100" alt="consumer looking for products">
          </div>
          <div class="carousel-item">
            <img src="assets/images/zhu-hongzhi-pHdx3P6zVn0-unsplash.jpg" class="d-block w-100" alt="bored retailer">
          </div>
          <div class="carousel-item">
            <img src="assets/images/v2osk-tn6ED3kTIJg-unsplash.jpg" class="d-block w-100" alt="the source of fresh goods">
          </div>
        </div>

      </div>

    </div>

    <div class="col-md-6 who-r-we">

      <h2>who are we</h2>

      <p><i class="fa-solid fa-person-circle-question"></i> from craving consumers. </p>

      <p><i class="fa-solid fa-face-grin-beam-sweat"></i> to bored retailers. </p>

      <p><i class="fa-solid fa-check-to-slot"></i> we are fresh from <b>the source</b>. </p>

      <div class="container-lg"><button type="button" class="btn btn-outline-primary" onclick="document.location='who-are-we/#our-story'">our story</button></div>      

    </div>

  </section>

  <section class="row container-fluid section-for-consumer">
    
    <div class="container-lg div-for-consumer">
      
      <div class="container-lg mt-5">

        <h2>find everything fresh</h2>
        <h3>with the best prices near you</h3>

      </div>      
  
      <div class="container-lg mt-4 mb-5">
        <div class="row justify-content-center ps-sm-4 pe-sm-4 g-1">
            <div class="col-md-4 p-2">
                <div class="p-card">
                    <div class="p-carousel">
                        <div class="carousel slide carousel-fade" data-bs-ride="carousel" id="carousel-2-1">
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item img-container active" style="background-image: url('assets/images/engin-akyurt-Y5n8mCpvlZU-unsplash.jpg');"></div>
                                <div class="carousel-item img-container" style="background-image: url('assets/images/anna-pelzer-IGfIGP5ONV0-unsplash.jpg');"></div>
                                <div class="carousel-item img-container" style="background-image: url('assets/images/scott-warman-NpNvI4ilT4A-unsplash.jpg');"></div>
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
                        <div class="buy mt-3"><button class="btn btn-primary" type="button" onclick="document.location='goods-near-you/'">check more prices near you</button></div>
                    </div>
                </div>
            </div>
  
            <div class="col-md-4 p-2">
                <div class="p-card">
                    <div class="p-carousel">
                        <div class="carousel slide carousel-fade" data-bs-ride="carousel" id="carousel-2-2">
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item img-container active" style="background-image: url('assets/images/eiliv-aceron-YlAmh_X_SsE-unsplash.jpg');"></div>
                                <div class="carousel-item img-container" style="background-image: url('assets/images/paras-kapoor-obrAaJAFXuw-unsplash.jpg');"></div>
                                <div class="carousel-item img-container" style="background-image: url('assets/images/jeremy-stewart-BvXUtQhTQzk-unsplash.jpg');"></div>
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
                        <div class="buy mt-3"><button class="btn btn-primary" type="button" onclick="document.location='goods-near-you/'">check more prices near you</button></div>
                    </div>
                </div>
            </div>
  
            <div class="col-md-4 p-2">
                <div class="p-card">
                    <div class="p-carousel">
                        <div class="carousel slide carousel-fade" data-bs-ride="carousel" id="carousel-2-3">
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item img-container active" style="background-image: url('assets/images/jacopo-maia--gOUx23DNks-unsplash.jpg');"></div>
                                <div class="carousel-item img-container" style="background-image: url('assets/images/nrd-D6Tu_L3chLE-unsplash.jpg');"></div>
                                <div class="carousel-item img-container" style="background-image: url('assets/images/scott-warman-NpNvI4ilT4A-unsplash.jpg');"></div>
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
                        <div class="buy mt-3"><button class="btn btn-primary" type="button" onclick="document.location='goods-near-you/'">check more prices near you</button></div>
                    </div>
                </div>
            </div>
  
        </div>
      </div>
  
    </div>

  </section>

  <section class="row container-xl ms-auto me-auto ps-3 pe-3 section-for-retailer">

    <div class="col-md-6 aim-to-be">

      <h2>be a top-tier retailer</h2>
      <h3>in your local community</h3>

      <p class="mt-3 mb-4">small-scale retailers often face concerns about highly perishable goods, so share them with us and start clearing out your inventory as soon as possible.</p>

      <div class="container-lg"><button type="button" class="btn btn-outline-primary" onclick="document.location='who-are-we/#retailer'">learn more</button></div>      

    </div>

    <div class="col-md-6">

      <div class="retailer-img">

        <img class="d-block w-100" src="assets/images/mike-petrucci-c9FQyqIECds-unsplash.jpg" alt="">

      </div>

    </div>

  </section>

  <section class="row container-fluid section-for-producer" id="sec-be-the-source">

    <div class="div-overlay p-3">
      
      <div class="container-lg div-for-consumer pt-5 pb-5">
        
        <div class="container-lg mt-5">

          <h2>if you are a local producer or a fisherman</h2>
          <h3>seeking to provide fresh products to your local community</h3>

        </div>      
    
        <div class="container-counter mt-4 mb-4">
    
          <div class="row justify-content-center">

            <div class="col-xl-12">
              <h3>you are in the right place</h3>
            </div>
      
            <div class="four col-md-3 p-2">

              <div class="counter-box pt-5 pb-5 colored">
                <i class="fa-solid fa-face-smile-beam"></i>
                <p><span id="count-1" class="counter">215000</span> <span class="s-suffix"> + </span></p>
                <p>happy consumers</p>
              </div>

            </div>

            <div class="four col-md-3 p-2">

              <div class="counter-box pt-5 pb-5">
                <i class="fa-solid fa-users-viewfinder"></i>
                <p><span id="count-2" class="counter">120000</span> <span class="s-suffix"> + </span></p>
                <p>registered members</p>
              </div>

            </div>

            <div class="four col-md-3 p-2">

              <div class="counter-box pt-5 pb-5">
                <i class="fa-solid fa-store"></i>
                <p><span id="count-3" class="counter">1500</span> <span class="s-suffix"> + </span></p>
                <p>retailers</p>
              </div>

            </div>

            <div class="four col-md-3 p-2">

              <div class="counter-box pt-5 pb-5">
                <i class="fa-solid fa-warehouse"></i>
                <p><span id="count-4" class="counter">5500</span> <span class="s-suffix"> +</span></p>
                <p>tons of fresh goods</p>
              </div>

            </div>

            <div class="col-xl-12">
              <h2>be <b>the source</b></h2>
              <div class="row justify-content-around">
                <div class="col-sm-4 d-grid gap-2">
                  <button class="btn btn-lg btn-primary" type="button" onclick="document.location='register/'">register today!</button>
                </div>
              </div>
            </div>

        </div>	
        
      </div>     

    </div>

  </section>  

  <?php include ("inc/footer.php"); ?>

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
            
            <a class="dbg mb-2" href="goods-near-you/index.html"> goods near you </a>
            <a class="dbg mb-2" href="my-account/index.html"> my account </a>
            <a class="dbg mb-2" href="my-store/index.html"> my store </a>
            <a class="dbg mb-2" href="positive-impact/index.html"> positive impact </a>
            <a class="dbg mb-2" href="contact-us/index.html"> contact us </a>

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
            <a class="dbg" href="sitemap/index.html">sitemap</a> <span class="ps-1 pe-1"> | </span> <a class="dbg" href="privacy-policy/index.html">privacy policy</a>
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
<script src="assets/bootstrap-5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/jquery-3.6.3.min.js"></script>
<script src="assets/js/scripts.js"></script>
