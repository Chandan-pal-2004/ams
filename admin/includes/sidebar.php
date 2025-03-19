<?php
$pageName = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") + 1);
?>

<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3"
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
                <a class="nav-link <?= $pageName == 'index.php' ? 'active' : ''; ?>" href="index.php">
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
                <a class="nav-link <?= $pageName == 'profile.php' ? 'active' : ''; ?>" href="profile.php">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i
                            class="fa fa-user <?= $pageName == 'profile.php' ? 'text-white' : 'text-dark'; ?> text-lg"></i>
                    </div>
                    <span class="nav-link-text ms-1">My Profile</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link  <?= $pageName == 'enquries.php' ? 'active' : ''; ?>" href="enquries.php">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i
                            class="fa fa-bullhorn <?= $pageName == 'enquries.php' ? 'text-white' : 'text-dark'; ?> text-lg"></i>
                    </div>
                    <span class="nav-link-text ms-1">Enquires</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Manage Services</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link  <?= $pageName == 'services.php' ? 'active' : ''; ?>
          <?= $pageName == 'services-create.php' ? 'active' : ''; ?>
          <?= $pageName == 'services-edit.php' ? 'active' : ''; ?>
          " href="services.php">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i
                            class="fa fa-globe <?= $pageName == 'services.php' ? 'text-white' : 'text-dark'; ?> text-lg"></i>
                    </div>
                    <span class="nav-link-text ms-1">Services</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">User Management</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link  <?= $pageName == 'users.php' ? 'active' : ''; ?>
          <?= $pageName == 'users-create.php' ? 'active' : ''; ?>
          <?= $pageName == 'users-edit.php' ? 'active' : ''; ?>
          " href="users.php">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i
                            class="fa fa-users <?= $pageName == 'users.php' ? 'text-white' : 'text-dark'; ?> text-lg"></i>
                    </div>
                    <span class="nav-link-text ms-1">Admin / Users</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Social Media Management</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $pageName == 'social-media.php' ? 'active' : ''; ?>
          <?= $pageName == 'social-media-create.php' ? 'active' : ''; ?>
          <?= $pageName == 'social-media-edit.php' ? 'active' : ''; ?>
           " href="social-media.php">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i
                            class="fa fa-globe <?= $pageName == 'social-media.php' ? 'text-white' : 'text-dark'; ?> text-lg"></i>
                    </div>
                    <span class="nav-link-text ms-1">Social Media</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Settings</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $pageName == 'settings.php' ? 'active' : ''; ?>" href="settings.php">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i
                            class="fa fa-cogs <?= $pageName == 'settings.php' ? 'text-white' : 'text-dark'; ?> text-lg"></i>
                    </div>
                    <span class="nav-link-text ms-1">Settings</span>
                </a>
            </li>

        </ul>
    </div>
    <div class="sidenav-footer mx-3 ">
        <a class="btn btn-danger mt-3 w-100" href="logout.php">
            LOGOUT
        </a>
    </div>
</aside>