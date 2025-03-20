<?php
$pageName = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") + 1);
?>

<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
    id="sidenav-main">
    <div class="sidenav-header">
        <a class="navbar-brand m-0" href="index.php">
            <h4>Farm Services</h4>
        </a>
    </div>

    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link  
          <?= $pageName == 'index.php' ? 'active' : ''; ?>" href="index.php">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i
                            class="fa fa-house <?= $pageName == 'index.php' ? 'text-white' : 'text-dark'; ?> text-lg"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">My Profile</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link  
          <?= $pageName == 'profile.php' ? 'active' : ''; ?>" href="profile.php">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i
                            class="fa fa-user <?= $pageName == 'profile.php' ? 'text-white' : 'text-dark'; ?> text-lg"></i>
                    </div>
                    <span class="nav-link-text ms-1">My Profile</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">SHOP</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link  
          <?= $pageName == 'cart.php' ? 'active' : ''; ?>" href="cart.php">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i
                            class="fa fa-shopping-cart <?= $pageName == 'cart.php' ? 'text-white' : 'text-dark'; ?> text-lg"></i>
                    </div>
                    <span class="nav-link-text ms-1">My Cart</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link  <?= $pageName == 'orders.php' ? 'active' : ''; ?>" href="orders.php">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-box <?= $pageName == 'orders.php' ? 'text-white' : 'text-dark'; ?> text-lg"></i>
                    </div>
                    <span class="nav-link-text ms-1">My Orders</span>
                </a>
            </li>

        </ul>
    </div>
    <div class="sidenav-footer mx-3 ">
        <a class="btn btn-danger mt-3 w-100" href="/ams/logout.php">
            LOGOUT
        </a>
    </div>
</aside>