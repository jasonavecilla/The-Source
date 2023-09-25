<?php
session_start();
if (isset($_SESSION['username']) && $_SESSION['username'] != "") {
  
} else {
  header("Location: /02-mp/pages/login");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Ted Llanes - MP2 | the source | my account </title>

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

      <h1> my account </h1>

    </div>

  </section>

  <section class="my-tabs">

    <div class="container">

      <nav>

        <div class="nav nav-tabs" id="nav-tab" role="tablist">
    
          <button class="nav-link active" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="true"> Profile </button>
    
          <button class="nav-link" id="nav-mem-tab" data-bs-toggle="tab" data-bs-target="#nav-mem" type="button" role="tab" aria-controls="nav-mem" aria-selected="false" disabled> Membership </button>
    
          <button class="nav-link" id="nav-disabled-tab" data-bs-toggle="tab" data-bs-target="#nav-disabled" type="button" role="tab" aria-controls="nav-disabled" aria-selected="false" disabled> My Order History </button>
    
          <button class="nav-link" id="nav-help-tab" data-bs-toggle="tab" data-bs-target="#nav-help" type="button" role="tab" aria-controls="nav-help" aria-selected="false" disabled> Help Desk </button>
    
        </div>
    
      </nav>
    
      <div class="tab-content" id="nav-tabContent">
    
        <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
          
          <section class="mt-0 mb-5">

            <div class="container py-5">
          
              <div class="row">

                <div class="col-lg-4 p-3">

                  <div class="card mb-4">
                    <div class="card-body p-4 text-center">
                      <img src="<?php
                        if(!$_SESSION['img']) {
                            echo $photo = '/02-mp/assets/images/emptyprof.jpg';
                        } else {
                            echo $photo = '/02-mp/admin/users/'.substr($_SESSION['img'],3);
                        }            
                    ?>" alt="<?php echo $_SESSION['username'] ?>"
                        class="rounded-circle img-fluid" style="width: 150px;" id="custPhoto">
                      <h5 class="my-3" id="custNameL"><?php echo $_SESSION['username'] ?></h5>
                      <!-- <p class="text-muted mb-1" id="custLevelL"><?php echo $_SESSION['level'] ?></p>
                      <p class="text-muted mb-4" id="custAddressL"><?php echo $_SESSION['address'] ?></p> -->
                      <input type="hidden" id="custId" value="<?php echo $_SESSION['id']; ?>">
                    </div>
                  </div>

                </div>
                
                <div class="col-lg-8 p-3">
                  <div class="card mb-4">
                    <div class="card-body p-4">

                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0"> Full Name </p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0" id="custName"><?php echo $_SESSION['fname'] ?></p>
                        </div>
                      </div>

                      <hr>

                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0"> Email </p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0" id="custEmail"><?php echo $_SESSION['email'] ?></p>
                        </div>
                      </div>

                      <hr>

                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0"> Phone </p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0" id="custPhone"><?php echo $_SESSION['phone'] ?></p>
                        </div>
                      </div>

                      <hr>

                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Address</p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0" id="custAddress"><?php echo $_SESSION['address'] ?></p>
                        </div>
                      </div>

                    </div>

                  </div>
                  <div class="d-flex flex-row justify-content-between">
                    <button class="btn btn-secondary btn-sm" id="custChangePass">Change Password</button>
                    <button class="btn btn-primary btn-sm" id="custUpdProfile" onclick="edit('<?php echo $_SESSION['id']; ?>')">Update Profile</button>
                  </div>
                </div>

              </div>

            </div>

          </section>
        
        </div>        
    
        <div class="tab-pane fade" id="nav-mem" role="tabpanel" aria-labelledby="nav-mem-tab" tabindex="0">
          
          <div class="row row-cols-1 row-cols-md-3 mb-3 py-5 text-center">
            
            <div class="col p-3">
              <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                  <h4 class="my-0 fw-normal">Level 1</h4>
                </div>
                <div class="card-body p-2">
                  <h1 class="card-title pricing-card-title"> ₱0.00 <small class="text-muted fw-light">/mo</small></h1>
                  <ul class="list-unstyled mt-3 mb-4">
                    <li>see products within 1km around you</li>
                    <li>buy products</li>
                    <li>email support</li>
                    <li>help center access</li>
                  </ul>
                  <button type="button" class="w-100 btn btn-lg btn-outline-primary">Sign up for free</button>
                </div>
              </div>
            </div>
            
            <div class="col p-3">
              <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                  <h4 class="my-0 fw-normal">Level 2</h4>
                </div>
                <div class="card-body p-2">
                  <h1 class="card-title pricing-card-title"> ₱100.00 <small class="text-muted fw-light">/mo</small></h1>
                  <ul class="list-unstyled mt-3 mb-4">
                    <li>see products city wide</li>
                    <li>buy products 1 hour ahead vs free members</li>
                    <li>open my store</li>
                    <li>priority email support</li>
                    <li>help center access</li>
                  </ul>
                  <button type="button" class="w-100 btn btn-lg btn-primary">Subscribe</button>
                </div>
              </div>
            </div>
            
            <div class="col p-3">
              <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                  <h4 class="my-0 fw-normal">Level 3</h4>
                </div>
                <div class="card-body p-2">
                  <h1 class="card-title pricing-card-title"> ₱200.00 <small class="text-muted fw-light">/mo</small></h1>
                  <ul class="list-unstyled mt-3 mb-4">
                    <li>see products region wide</li>
                    <li>buy products 2 hours ahead vs level 2 members</li>
                    <li>open my store</li>
                    <li>priority email support</li>
                    <li>help center access</li>
                  </ul>
                  <button type="button" class="w-100 btn btn-lg btn-primary">Upgrade</button>
                </div>
              </div>
            </div>

          </div>
    
        </div>
    
        <div class="tab-pane fade" id="nav-disabled" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0">
          
          ...
        
        </div>


    
        <div class="tab-pane fade" id="nav-help" role="tabpanel" aria-labelledby="nav-helpt-tab" tabindex="0">
          
          <div class="card p-4 mx-4 my-5">
    
            <form class="">

              <p class="text-center mb-4"><em>“The man who asks a question is a fool for a minute, the man who does not ask is a fool for life.”</em> — Confucius</p>

              <div class="d-flex flex-row align-items-center mb-4">
                <div class="form-outline flex-fill mb-0">

                  <label class="form-label" for="form3Example1c">your name</label>
                  <input type="text" id="form3Example1c" class="form-control" placeholder="enter your name" />
                  
                </div>
              </div>

              <div class="d-flex flex-row align-items-center mb-4">
                <div class="form-outline flex-fill mb-0">

                  <label class="form-label" for="form3Example2c">phone number</label>
                  <input type="number" id="form3Example2c" class="form-control" placeholder="enter your phone number" />
                  
                </div>
              </div>

              <div class="d-flex flex-row align-items-center mb-4">
                <div class="form-outline flex-fill mb-0">

                  <label class="form-label" for="form3Example3c">your email</label>
                  <input type="email" id="form3Example3c" class="form-control" placeholder="enter your email" />
                  
                </div>
              </div>

              <div class="d-flex flex-row align-items-center mb-4">
                <div class="form-outline flex-fill mb-0">

                  <label class="form-label" for="form3Example4cd">message / questions</label>
                  <textarea id="form3Example4cd" class="form-control" placeholder="state your message / questions" rows="5"></textarea>
                  
                </div>
              </div>

              <div class="d-grid gap-2 mb-3 mb-lg-4">
                <button type="button" class="btn btn-primary btn-lg">send</button>
              </div>

            </form>

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
<script>
  let nId = document.querySelector('#custId').value;
  function edit(nId) {
    window.location = "edit-profile.php?id=" + nId;
  }
</script>
<script src="../assets/bootstrap-5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/jquery-3.6.3.min.js"></script>
<script src="../assets/js/scripts.js"></script>