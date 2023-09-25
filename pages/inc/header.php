<div class="header-toolbar container-fluid">

    <div class="row p-2 container-xl m-auto">

      <div class="col-sm-8">

        <ul class="list-group list-group-flush list-group-horizontal">
          <li class="list-group-item"><a class="dbg" href="tel:09760836551"><i class="fa-solid fa-phone"></i> 09760836551</a></li>
          <li class="list-group-item"><a class="dbg" href="mailto:fr3d.1lanes@gmail.com"><i class="fa-solid fa-envelope"></i> fr3d.1lanes@gmail.com</a></li>
        </ul>

      </div>

      <div class="col-sm-4">

        <?php 
          if (isset($_SESSION['username']) && $_SESSION['username'] != "") { ?>
            <div class="dropdown div-user-toggler text-white">
                <a class="dropdown-toggle text-light d-flex flex-row justify-content-end align-items-center" href="#" role="button" id="dropdownMenuLink" data-bs-toggle='dropdown' aria-haspopup="true" aria-expanded="false">
                    <div class="d-flex flex-row align-items-center pe-1" style="">                
                        <div class="user_img pe-2"> <img id="user-photo" src="<?php
                            if(!$_SESSION['img']) {
                                echo $photo = '/02-mp/assets/images/emptyprof.jpg';
                            } else {
                                echo $photo = '/02-mp/admin/users/'.substr($_SESSION['img'],3);
                            }            
                        ?>" alt="<?php echo $_SESSION['username'] ?>" style="width: 32px; aspect-ratio:1; border-radius: 50%; margin: 3px;">
                        </div>
                        <div class="fw-bold" id="span_un">
                           Hi,  <?php echo $_SESSION['username'] ?>
                        </div>         
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right py-2" aria-labelledby="dropdownMenuLink" style="z-index:999999999999999999999999;">
                    <a class="dropdown-item" href="/02-mp/pages/my-account">My Account</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/02-mp/pages/logout">Logout</a>
                </div>
            </div>

          <?php } else {
            $sHtml = '<ul class="list-group list-group-flush list-group-horizontal d-flex flex-row justify-content-end">
                        <li class="list-group-item"><a class="dbg" href="/02-mp/pages/login"> login </a></li>
                        <li class="list-group-item"><a class="dbg" href=""> |</a></li>
                        <li class="list-group-item"><a class="dbg" href="/02-mp/pages/register"> register</a></li>
                      </ul>            
            ';
            echo $sHtml;             
          }

                   
        ?>

      </div>

    </div>

  </div>

  <header class="sticky-md-top">

    <div class="row p-2 container-xl m-auto">

      <nav class="navbar navbar-expand-lg bg-body-tertiary">      

        <div class="container-fluid">

          <div class="d-flex position-relative logo-container">

            <img class="flex-shrink-0 me-2 logo-img" src="/02-mp/pages/assets/images/the-source-favicon-removebg-preview.png" width="90px" alt="the source logo">

            <div class="align-self-center">

              <h2 class="logo-name"> <a class="stretched-link" href="/02-mp/pages/"> the source </a> </h2>
              <p class="logo-slogan"> everyting fresh </p>
            
            </div>

          </div>
  
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

              <li class="nav-item ms-3">
                <a class="nav-link <?php echo $is_page = ($sPage == 'home') ? 'active' : false; ?>" aria-current="page" href="/02-mp/pages/"> home </a>
              </li>

              <li class="nav-item ms-3">
                <a class="nav-link <?php echo $is_page = ($sPage == 'who we are') ? 'active' : false; ?>" href="/02-mp/pages/who-are-we"> who are we </a>
              </li>

              <li class="nav-item ms-3">
                <a class="nav-link <?php echo $is_page = ($sPage == 'goods near you') ? 'active' : false; ?>" href="/02-mp/pages/goods-near-you"> goods near you </a>
              </li>

              <li class="nav-item ms-3 dropdown">
                <a class="nav-link dropdown-toggle <?php echo $is_page = ($sPage == 'positive impact') ? 'active' : false; ?>" href="/02-mp/pages/positive-impact" role="button" data-bs-toggle="dropdown" aria-expanded="false"> positive impact </a>

                <ul class="dropdown-menu">

                  <li><a class="dropdown-item <?php echo $is_page = ($sPage == 'reviews') ? 'active' : false; ?>" href="/02-mp/pages/positive-impact/reviews"> reviews </a></li>

                  <li><a class="dropdown-item <?php echo $is_page = ($sPage == 'blogs') ? 'active' : false; ?>" href="/02-mp/pages/positive-impact/blogs"> blogs </a></li>

                  <li><a class="dropdown-item <?php echo $is_page = ($sPage == 'vlogs') ? 'active' : false; ?>" href="/02-mp/pages/positive-impact/vlogs"> vlogs </a></li>

                </ul>

              </li>

              <li class="nav-item ms-3">
                <button class="nav-link btn btn-primary ps-3 pe-3" onclick="document.location='/02-mp/pages/contact-us'"> contact us </button>
              </li>

            </ul>

          </div>

        </div>        

      </nav>
  
    </div> 

  </header>