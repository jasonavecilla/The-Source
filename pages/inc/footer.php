<footer class="row">

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
            
            <a class="dbg mb-2" href="/02-mp/pages/goods-near-you/"> goods near you </a>
            <a class="dbg mb-2" href="/02-mp/pages/my-account/"> my account </a>
            <a class="dbg mb-2" href="/02-mp/pages/my-store/"> my store </a>
            <a class="dbg mb-2" href="/02-mp/pages/positive-impact/"> positive impact </a>
            <a class="dbg mb-2" href="/02-mp/pages/contact-us/"> contact us </a>

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
            <a class="dbg" href="/02-mp/pages/sitemap/">sitemap</a> <span class="ps-1 pe-1"> | </span> <a class="dbg" href="/02-mp/pages/privacy-policy/">privacy policy</a>
          </div>
    
          <div class="col-sm-6 d-flex justify-content-end align-self-center">
            <div>© <span id="copyright-year"></span> <big><b>the source</b></big></div>
          </div>
  
        </div>
  
      </div>

    </div>

    <div class="w-auto fixed-bottom bottom-0 end-0 m-4" style="z-index: 9999;">
      <a href="/02-mp/pages/cart/" class="position-relative text-warning" style="font-size:42px; line-height:1em;"><i class="bi-cart3"></i>
        <span class="position-absolute top-25 start-100 translate-middle p-2 bg-danger border border-light rounded-circle text-white" style="font-size: 14px; line-height: 1em; font-family: monospace; padding: 5px 8px !important;">
          
          <?php
            try {
              if(!isset($_SESSION['mycart'])) {
                $_SESSION['mycart'] = array();             
              }
              echo $is_sizeof = (sizeof($_SESSION['mycart'])) ? sizeof($_SESSION['mycart']) : '0';        
            } catch(Exception $e) {
              echo "0";
            }          
          ?>         
          
          <span class="visually-hidden">Products</span>
        </span>
      </a>
    </div>
    

  </footer>