<?php
    // session_start();

    if(isset($_SESSION['username']) && $_SESSION['username'] != "") {
        $sUserSession = $_SESSION['username'];
        $sUserPosition = $_SESSION['position'];
        $sUserLevel = $_SESSION['level'];
        $sUserPhoto = $_SESSION['img'];
        $nId = $_SESSION['id'];
    } else {
        header("Location: ../login");
        exit();
    }
    
?>


<header class="header shadow-sm" id="header">
        <div class="header_toggle"> <i class='fs-5 bi-list' id="header-toggle"></i> </div>
        <div class="dropdown div-user-toggler">
            <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle='dropdown' aria-haspopup="true" aria-expanded="false">
                <div class="d-grid div-user" style="width:200px">                
                    <div class="user_img"> <img id="user-photo" src="<?php
                        if(!$sUserPhoto) {
                            echo $photo = '/02-mp/assets/images/emptyprof.jpg';
                        } else if($sUserPhoto == '/02-mp/assets/images/emptyprof.jpg') {
                            echo $photo = '/02-mp/assets/images/emptyprof.jpg';
                        } else {
                            echo $photo = '/02-mp/admin/users/'.substr($sUserPhoto,3);
                        }          
                    ?>" alt="<?php echo $sUserSession ?>" style="width: 42px; aspect-ratio:1; border-radius: 50%; margin: 3px;">
                    </div>
                    <span class="fw-bold" id="span_un">
                        <?php echo $sUserSession ?>
                    </span>
                    <span class="fs-6 fst-italic" id="span_pos"><?php echo $sUserPosition ?></span>
                    <span class="fs-6" id="span_access"> - <?php echo $sUserLevel ?></span>            
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="/02-mp/admin/users/my-profile/?id=<?php echo $nId ?>">Edit Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/02-mp/logout.php">Logout</a>
            </div>
        </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="/02-mp/pages" class="nav_logo"> <i class='fs-5 bi-shop nav_logo-icon'></i> <span class="nav_logo-name">Shop Online</span> </a>
                <div class="nav_list">
                    <a href="/02-mp/admin" class="nav_link <?php echo $is_page = ($sPage == 'admin') ? 'active' : false; ?>"> <i class='fs-5 bi-speedometer2 nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
                    <a href="/02-mp/admin/users" class="nav_link <?php echo $is_page = ($sPage == 'users') ? 'active' : false; ?>"> <i class='fs-5 bi-person-circle nav_icon'></i> <span class="nav_name">Users</span> </a>
                    <a href="/02-mp/products" class="nav_link <?php echo $is_page = ($sPage == 'products') ? 'active' : false; ?>"> <i class='fs-5 bi-grid nav_icon'></i> <span class="nav_name">Products</span> </a>
                    <a href="/02-mp/customers" class="nav_link <?php echo $is_page = ($sPage == 'customers') ? 'active' : false; ?>"> <i class='fs-5 bi-people nav_icon'></i> <span class="nav_name">Customers</span> </a>
                    <a href="/02-mp/transactions" class="nav_link <?php echo $is_page = ($sPage == 'transactions') ? 'active' : false; ?>"> <i class='fs-5 bi-receipt-cutoff nav_icon'></i> <span class="nav_name">Transactions</span> </a>
                </div>
            </div> 
            <a href="/02-mp/logout.php" class="nav_link"> <i class='fs-5 bi-box-arrow-left nav_icon'></i> <span class="nav_name">Logout</span> </a>
        </nav>
    </div>